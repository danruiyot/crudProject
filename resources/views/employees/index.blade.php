@extends('layouts.app')
@section('content')
<div class="container">
<div>
<div>
<h3>Employees</h3>
</div>
<div>
<a class="btn btn-success" href="{{route('employees.create')}}">Add new Employees</a>
</div>
</div>
@if($message = Session::get('success'))
<p>{{$message}}</p>
</div>
@endif
<br>
<table class="table">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Action</th>
</tr>
@foreach ($employees as $employees)
<tr>
<td>{{$employees->fname}}</td>
<td>{{$employees->lname}}</td>
<td>{{$employees->email}}</td>
<td>
<form class="" action="{{route('employees.destroy', $employees->id)}}" method="post">
<a class="btn btn-warning" href="{{route('employees.edit', $employees->id)}}">edit</a>
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>

</div>
@endsection
