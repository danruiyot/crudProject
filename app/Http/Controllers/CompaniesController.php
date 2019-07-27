<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\companies;
use Illuminate\Support\Facades\Storage;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
	    $companies = companies::all();
return view('companies.index', compact('companies')); 

 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('companies.create');
	 
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formInput=$request->except('image');

        $image=$request->image;
       // dd($image);
        if($image)
        {
          $formInput['image']=Storage::disk('local')->put('public', $image);
        }

        companies::create($formInput);



	    return redirect()->route('companies.index')
		    ->with('success','new company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $companies = companies::find($id);
	    return view('companies.edit', compact('companies'));

   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
	       	'name'=>'required', 
		'email'=>'required', 
		'website'=>'required' 
	]);
	 

	  $companies = companies::find($id);
    $companies->name = $request->name;
    $companies->email = $request->email;
    $companies->website = $request->website;

    $companies->save();
    $companies -> update([
'image' => request()->image->store('uploads', 'public'),
]);
return redirect()->route('companies.index')                                                                         ->with('success','company edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $companies = companies::find($id);
	   Storage::delete($companies->image);
      
	    $companies->delete(); 

	    return redirect()->route('companies.index')                                                                         ->with('success','company deleted');
    }
}
