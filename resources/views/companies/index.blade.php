
@extends('layouts.app')
@section('content')
<div class="container">
<div>
<div>
<h3>Employees</h3>
</div>
<div>
<a class="btn btn-success" href="{{route('companies.create')}}">Add new Company</a>
</div>
</div>
@if($message = Session::get('success'))
<p>{{$message}}</p>
</div>
@endif
<br>
<table class="table">
<tr>
<th>Logo</th>
<th>Name</th>
<th>Email</th>
<th>Website</th>
<th>Action</th>
</tr>
@foreach ($companies as $companies)
<tr>
<td>
<img class="thumbnail" src="{{ url('storage/'.$companies->image) }}" alt="" title="" >
</td>
<td>{{$companies->name}}</td>
<td>{{$companies->email}}</td>
<td>{{$companies->website}}</td>
<td>
<form class="" action="{{route('companies.destroy', $companies->id)}}" method="post">

<a class="btn btn-warning" href="{{route('companies.edit', $companies->id)}}">edit</a>
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

