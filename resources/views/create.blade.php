@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create new Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                    href="{{ route('Management.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div> 
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Problems!!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('Management.store') }}" method="POST">
        {{ csrf_field() }}
  
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Project title...">
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="text" class="form-control" placeholder="Project text...">
                </div>
                <div class="form-group">
                    <strong>Competent:</strong>
                    <input type="text" name="competent" class="form-control" placeholder="Project text...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection