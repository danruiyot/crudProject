<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$employees = employees::all();
return view('employees.index', compact('employees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $request->validate([
		    'fname' => 'required',
		    'lname' => 'required',
		    'email' => 'required'
	    ]);
	    employees::create($request ->all());
	    return redirect()->route('employees.index')
		    ->with('success','new employee added successfully');
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
	    $employees = employees::find($id);
	    return view('employees.edit', compact('employees'));

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
	       	'fname'=>'required', 
		'lname'=>'required', 
		'email'=>'required' 
]);
 $employees = employees::find($id); 
$employees->fname = $request->get('fname'); 
$employees->lname = $request->get('lname');
$employees->email = $request->get('email'); 

$employees->save();
return redirect()->route('employees.index')                                                                         ->with('success','employe edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

	    $employees = employees::find($id); $employees->delete(); 

	    return redirect()->route('employees.index')                                                                         ->with('success','employe deleted'); 
    }
}
