@extends('layouts.app')
@section('content')
<div class="container">
<div>
<div>
<h3>New Employee</h3>
</div>
@if($errors->any())
	<div class="alert alert-danger">
	<strong>Whoops!</strong> problems with inputs. <br>
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	</div>
	@endif
	<form action="{{route('employees.store')}}" method="post">
	@csrf
	<div>
	<div>
	<strong>First Name</strong>
	<input type="text" name="fname" class="form-control" placeholder="First name">
	</div>
	
		<div>
	<strong>Last name</strong>
	<input type="text" name="lname" class="form-control" placeholder="Last name">
	</div>
	
		<div>
	<strong>Email</strong>
	<input type="text" name="email" class="form-control" placeholder="Email">
	</div>

		<div class="form-group">
<strong>Company :</strong>
  	 <div class="">					 <select name="company_id" class="form-control">
   @foreach ($companies as $companies)		         <option value="{{$companies->id}}">{{$companies->name}}</option>
   @endforeach
  </select>
 </div>
  </div>


	<div>
	<a href="{{route('employees.index')}}" class="btn btn-primary">back</a>
	<button type="submit" class="btn btn-success">Submit</button>
	</div>
	</div>
	</form>
</div>
</div>
@endsection
