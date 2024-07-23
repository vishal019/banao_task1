<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;

class TaskController extends Controller
{
    public function addTask(Request $request){


      

      

        $task = new task();
        $task->user_id = $request->user_id;
        $task->task = $request->task;
        $task->save();

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => 'Successfully created a task',
        ]);



    }


    public function updateTaskStatus(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer',
            'status' => 'required|in:pending,done',
        ]);

        $task = Task::find($request->task_id);

        if (!$task) {
            return response()->json([
                'status' => 0,
                'message' => 'Task not found',
            ], 404);
        }

        
        $task->status = $request->status;
        $task->save();

        $statusMessage = $request->status == 'done' ? 'Marked task as done' : 'Marked task as pending';

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => $statusMessage,
        ]);
    }


    public function detele_task(Request $request){


        $task = task::where('id',$request->task_id)->get();

        $task[0]->delete();
    

        return back();

    }

}
