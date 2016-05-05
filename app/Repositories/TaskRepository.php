<?php
namespace App\Repositories;
use App\Task;
use App\User;

class TaskRepository{
    public function forUser(User $user){
        return Task::where('user_id',$user->id)
            ->orderBy('created_at')
            ->get();
    }
}