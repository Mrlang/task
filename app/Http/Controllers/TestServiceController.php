<?php

namespace App\Http\Controllers;


use App\Events\TaskSaved;
use App\Jobs\SendReminderEmail;
use App\Task;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestServiceController extends Controller
{
    /**
     *  发送邮件
     *  可以直接发送,也可以通过Mail类将其放进队列等待执行
     */
    public function send(){
        $data['testVar'] = 'this is a var';
        $path = '/s/latest/task/public/image/test.png';
        \Mail::queueOn('default','emails.firstMail', $data, function($message) use ($path) {
            $message->from('13032362945@163.com','liang');
            $message->to('578423625@qq.com')->subject('测试邮件2');
            $message->attach($path);
        });
        echo 'OK';
    }

    /**
     * 添加队列job
     *
     */
    public function addJob() {
        //其他过程
        //发送邮件提醒
        $user = User::find(9);
        //实例化一个job,将其加入队列
//        $this->dispatch(new SendReminderEmail($user));
//        推送任务到指定队列
        $job = (new SendReminderEmail($user))->onQueue('default');
        $this->dispatch($job);


        echo 'add Job OK';
    }

    public function addEvent() {
        $task = new Task();
        $user = User::findOrFail(9);
        $task->user_id = $user->id;
        $task->name = 'addTaskThenEvent';
        \Event::fire(new TaskSaved($task));


        echo 'fired TaskSaved Event';
        \Log::info('保存文章到缓存成功！',['user_id'=>$task->user_id,'title'=>$task->name]);

    }
}
