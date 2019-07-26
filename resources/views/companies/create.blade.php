@extends('layouts.app')
@section('content')
<div class="container">
<div>
<div>
<h3>New Company</h3>
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
	<form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data" >
	@csrf
	<div>
	<div class="form-group">
	<strong>Company Name</strong>
	<input type="text" name="name" class="form-control" placeholder=" name">
	</div>
	
		<div class="form-group">
	<strong>Company Email</strong>
	<input type="email" name="email" class="form-control" placeholder="Email">
	</div>
	
		<div class="form-group">
	<strong>Company Website</strong>
	<input type="text" name="website" class="form-control" placeholder="website">
	</div>

    <div class="form-group">
	<label for="logo">Logo:</label>
        <input type="file" class="form-control" name="image"/>
    </div>
	<br>
	<div >
	<a href="{{route('companies.index')}}" class="btn btn-primary">Back</a>
	<button type="submit" class="btn btn-success">Submit</button>
	</div>
	</div>
	</form>
</div>
</div>
@endsection
