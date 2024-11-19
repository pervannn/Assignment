@extends('layout') 
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Project Management Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Management.create') }}">
                    Create New Project
                </a>
            </div>
        </div>
    </div> 
 
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif 
 
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Competent</th>
            <th style="width:280px">Action</th>
        </tr> 
 
        @foreach($Project as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->title}}
                @if ($project->status == 'deleted')
                    <td><del>{{ $project->text }}</del></td>
                    <td>Deleted</td>
                @else
                    <td>{{ $project->text }}</td>
                    <td>Active</td>
                @endif               
 
                <td>
                    {{ $project->competent }}
                </td>
                
                <td>
                    <form action="{{ route('Management.destroy', $project->id) }}" method="POST">
                        <a class="btn btn-info"
                            href="{{ route('Management.show', $project->id) }}">
                            Show
                        </a> 
 
                        <a class="btn btn-primary"
                            href="{{ route('Management.edit', $project->id) }}">
                            Edit
                        </a> 
 
                        {{-- @csrf+
                        @method('DELETE')
                        --}} 
 
                        {{ csrf_field() }}
                       {{ method_field('DELETE') }}
  
 
                        <button type="submit" class="btn btn-danger">
                            Edit Status
                        </button> 
 
                    </form>
                </td>
            </tr>
        @endforeach
    </table> 
 
    {!! $Project->links() !!} 
 
@endsection