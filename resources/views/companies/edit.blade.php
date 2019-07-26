@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Company</h1>

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
        <form method="post" action="{{ route('companies.update', $companies->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="name">First Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $companies->name }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $companies->email }}" />
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" name="website" value="{{ $companies->website }}" />
	    </div>
<div class="form-group">                                  <label for="logo">Logo :</label>                 <input type="file" class="form-control" name="image" />               </div>
<br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
