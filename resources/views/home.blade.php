@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    Welcome to the Employee management sytem.

                </div>
	    </div>
<div  class="container-fluid">
  <h1>Employees </h1>
  <p>
This is the section where you will be able to add, edit and delete employees
</p>
</div>
<div  class="container-fluid">
  <h1>Companies </h1>
  <p>
This is the section where you will be able to add, edit and delete various Companies
</p>
</div>
        </div>
    </div>
</div>

@endsection
