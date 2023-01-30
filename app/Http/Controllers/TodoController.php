<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = Todo::where('status','進行中')->get();
        $created = Todo::where('status','未完了')->get();
        $completed = Todo::where('status','完了')->get();

        return view('todo.index', compact('process','created','completed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Todo();
        $task->title = $request->input('title');
        $task->due_deta = $request->input('due_date');
        $task->content = $request->input('content');
        $request->input('content') ?
         $task->content = $request->input('content'): $task->content = null;
        $task->status = '未完了';
        $task->save();

        return redirect()->route('todo.index')->with('flash_message','タスクを完了しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if($todo->status == '未完了'){
            $todo->status = '進行中';
        }elseif($todo->status =='進行中'){
            $todo->status ='完了';
        }else{
            $todo->status = '未完了';
        }
        $todo->update();

        return redirect()->route('todo.index')->with('flash_message','更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index')->with('flash_message','削除しました');
    }
}
