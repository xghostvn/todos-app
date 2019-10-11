<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //

    public function index()
    {

    	$todos = DB::table('todos')->get();

    	return view('todos.index')->with('todos',$todos);
    }


    public function show($id)
    {
    		$todo = DB::table('todos')->where('id',$id)->first();
            return view('todos.show')->with('todo',$todo);
    		
    }

    public function edit($id)
    {
        $todo = DB::table('todos')->where('id',$id)->first();
        return view('todos.edit')->with('todo',$todo);    
    }


    public function update_todo($id)
    {
        $this->validate(request(),[
                'name' => 'required|min:6|max:30',
                'description' =>'required'
        ]);

        $data = request()->all();

        DB::table('todos')->where('id',$id)->update([        
                'name'=>$data['name'],
                'description'=>$data['description']
            ]);
        return redirect('/todos');
    }

    public function delete($id)
    {
            DB::table('todos')->where('id',$id)->delete();
            return redirect('/todos');
    }

    public function complete($id)
    {
            DB::table('todos')->where('id',$id)->update([
                'completed' => true
            ]);
             return redirect('/todos');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function save_todo()
    {
        $data = request()->all();
        DB::table('todos')->insert([
            'name'=>$data['name'],
            'description' => $data['description'],
            'completed' => false
        ]);

        return redirect('/todos');
    }
}
