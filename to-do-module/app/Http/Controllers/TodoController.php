<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todo_list=Todo::all();
        return response()->json($todo_list);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        //
   
        $newTodoItem = new Todo();
        $newTodoItem->name = $request->name;
        $newTodoItem->description = $request->description;
        $newTodoItem->completed=0;
        $newTodoItem->save();
        return $newTodoItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $todoItem = Todo::find($id);  
        return response()->json($todoItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        //

        $todoItem = Todo::find($id);  

        if($todoItem){
           $todoItem->name = $request->name;
           $todoItem->description = $request->description;
           $todoItem->updated_at = Carbon::now() ;
           $todoItem->save();
           return $todoItem;

        }else{
            return "Not  found";
        } 
        
    }

// update status
    public function updateStatus($id)
    {
        //
        $todoItem = Todo::find($id);
        if($todoItem){
           $todoItem->completed=1;
           $todoItem->update();
           return "Updated successfully !";
    }else{

        return "Not found ! Operation failed";

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $todoItem = Todo::find($id);
        if($todoItem){
           $todoItem->delete();
           return "Deleted successfully !";
    }else{

        return "Not found ! Operation failed";

    }


    
    
    }
}
