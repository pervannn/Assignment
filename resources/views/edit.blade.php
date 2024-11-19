@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
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
            <strong>Problems!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('Management.update', $Project->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  
    <div class="row">
        <div class="col-xs-1 col-sm-120 col-md-123">
            <div class="form-group">
                <strong>Project title:</strong>
                <input type="text" name="title" value="{{ $Project->title }}"
                class="form-control" style="width: 200px">
            </div>
            <div class="form-group">
                <strong>Project description:</strong>
                <input type="text" name="text" value="{{ $Project->text }}"
                class="form-control" style="width: 200px">
            </div>
            <div class="form-group">
                <strong>Competent:</strong>
                <input type="text" name="competent" value="{{ $Project->competent }}"
                class="form-control" style="width: 200px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project status:</strong>
                <select name="status" class="form-select">
                    @php
                    $statuses = ['active', 'deleted'];
                    @endphp
                    @foreach ($statuses as $status)
                        @if($status === $Project->status)
                            <option selected value="{{ $status }}">{{ $status }} </option>
                        @else
                            <option value="{{ $status }}">{{ $status }} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
  
@endsection
