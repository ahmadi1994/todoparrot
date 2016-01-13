<?php

namespace App\Http\Controllers;

use App\Task;
use App\TodoList;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($listId)

    {

            $list = TodoList::findOrFail($listId);

            return view('tasks.create')->with('list', $list);



        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($listId,Request $request)
    {


        $list = TodoList::findOrFail($listId);
        $task = new Task;
        $task->name=$request->get('name');
        $task->description=$request->get('description');
        $task->chick = true ? $request->get('chick') == 'true' : false;
        $task = $list->tasks()->save($task);

//        $task->save();

//        $task = new Task([
//                'name' => $request->get('name'),
//                'description' => $request->get('due'),
//                 'todolist_id'=>1,
//                'chick' => true ? $request->get('done') == 'true' : false
//            ]);


//        $task = $list->tasks()->save($task);

            return \Redirect::route('list.show', $listId)
                ->with('message', 'Your task has been created!');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($task,$id)
    {
        $task = Task::findOrFail($id);


        return view('tasks.edit')->with('task', $task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($listId,$taskId,Request $request)
    {
        $task = Task::find($taskId);




            $task->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'ckick' =>  true ? $request->get('chick') == 'true' : false
            ]);

            return \Redirect::route('list.show',$listId)->with('message', 'Your task has been updated!');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($listId, $taskId)
    {


        $task = Task::findOrFail($taskId);


            $task->delete();

            return \Redirect::route('list.show',$listId)
                ->with('message', 'Task deleted!');

    }
    public function complete($listId, $taskId)
    {

        $task = Task::findOrFail($taskId);

        if ($task->chick == true)
        {
            $task->chick = false;
        } else {
            $task->chick = true;
        }

        $task->save();

        return \Redirect::route('list.show',$listId)
            ->with('message', 'Task updated!');

    }
}
