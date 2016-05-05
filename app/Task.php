<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    public function getUser(){
        return $this->belongsTo(User::class);
    }
}
