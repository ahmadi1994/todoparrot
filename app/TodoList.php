<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TodoList extends Model
{
    protected $table = 'todolist';
    protected $fillable=['name','description'];
    protected $guarded=['some_important_attr'];

    //
    private $rules=[
        "name"=>'required',
        "description"=>"required"
    ];
    public function validate(){
        $v=Validator::make($this->attributes,$this->rules);
        if($v->passes())return true;
        $this->errors= $v->messages();
        return false;
    }
    public function Tasks(){

        return $this->hasMany('App\Task');
    }
    public function categroys(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function comments(){

        return $this->morphMany('App\Comment','comentable');
    }
}
