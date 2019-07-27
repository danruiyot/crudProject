@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update an Employee</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('employees.update', $employees->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="fname">First Name:</label>
                <input type="text" class="form-control" name="fname" value={{ $employees->fname }} />
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" name="lname" value={{ $employees->lname }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $employees->email }} />
	    </div>

 <div class="form-group">
<label for="company_id" class="">Company Name:</label>
 <div >
 <select name="company_id" class="form-control">
 <option value="{{$employees->companies->id}}">{{$employees->companies->name}}</option>
  @foreach ($companies as $companies)
  @if ($employees->companies->id === $companies->id)  
  @else
	  <option value="{{$companies->id}}">{{$companies->name}}</option>
  @endif
 @endforeach
  </select>
  </div>
 </div>

<br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
