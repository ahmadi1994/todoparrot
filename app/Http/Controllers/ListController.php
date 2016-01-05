<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
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
//        $list=TodoList::orderBy('updated_at', 'DESC')->orderBy('name', 'ASC')->get();
        $list=TodoList::orderBy('created_at', 'desc')->paginate(10);
        //
        $lists = TodoList::select(DB::raw('year(created_at) as year'),
                 DB::raw('count(name) as `count`'))->groupBy('year')->orderBy("count","DESC")->get();
//        $lists = TodoList::orderBy('created_at', 'desc')->paginate(10);

        return view('lists.index',compact("list",$list,"lists",$lists));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("lists.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list=TodoList::create($request->toArray());
        $list->save();
        return redirect("/list");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=TodoList::findOrFail($id);
        //
        return view("lists.show",compact('data',$data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request,$id)
    {
        $message='g';
        $list = TodoList::find($id);


       return  view("lists.edit",compact("list",$list,"message",$message));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list = Todolist::find($id);
         $list->update([
        'name' => $request->get('name'),
        'description' => $request->get('description')
        ]);
        $message='Your list has been updated';
        return \Redirect::Route('list.edit',
        array($list->id))->with('message',$message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TodoList::destroy($id);
        return \Redirect::route('list.index') ->with('message', 'The list has been deleted!');
    }
}
