@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                    href="{{ route('Management.index')}}">
                    Back
                </a>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project name: </strong>
                {{ $Project->title }}
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                @if ($Project->status === 'active')
                    {{ $Project->text }}
                @else
                    <del> {{ $Project->text }} </del>
                @endif
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                @if ($Project->status === 'active')
                    Active
                @else
                    Deleted
                @endif
            </div>
            <div class="form-group">
                <strong>Competent:</strong>
                {{ $Project->competent }}
            </div>
        </div>
    </div>
@endsection