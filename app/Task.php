<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['id','name','description','todo_list_id','chick'];
    //
public function TodoList(){

    return $this->belongsTo('App\TodoList');
}
}
