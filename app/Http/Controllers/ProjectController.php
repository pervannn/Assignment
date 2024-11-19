<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
       $Project = Management::latest()->paginate(5);
  
       return view('index', compact('Project'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
  
    public function create()
    {
        return view('create');
    }
  
  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'competent' => 'required'
        ]);
  
        Management::create(array_merge($request->all(), ['status' => 'active']));
  
        $Project = Management::latest()->paginate(5);
  
        return view('index', compact('Project'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('success', 'Note updated sucessfully!');
    }
  
    public function show($id)
    {
        $Project = Management::find($id);
  
        return view('show', compact('Project'));
    }
  
    public function edit($id)
    {
        $Project = Management::find($id);
        return view('edit', compact('Project', 'id'));
    }
  
    public function update($id, Request $request)
    {
  
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'status' => 'required',
            'competent' => 'required'
        ]);
  
  
        $Project = Management::find($id);
        $Project->title = request('title');
        $Project->text = request('text');
        $Project->status = request('status');
        $Project->competent = request('competent');
        $Project->save();
  
         
        $Project = Management::latest()->paginate(5);
        return view('index', compact('Project'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function destroy($id)
    {
        $Project = Management::find($id);
        if($Project->status === 'active'){
            $Project->status = 'deleted';
        }else{
            $Project->status = 'active';
        }
        $Project->save();
  
         
        $Project = Management::latest()->paginate(5);
        return view('index', compact('Project'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
  
    }
}
