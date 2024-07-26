<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{




    public function display_task(Request $request){

        $login_id=$request->session()->get('loginId');
        $tasks=task::where('user_id',$login_id)->get();

         return response()->json(['tasks'=>$tasks]);
      


    }
    public function addTask(Request $request){


      

      
        $login_id=$request->session()->get('loginId');
        $task = new task();
        $task->user_id = $login_id;
        $task->task = $request->title;
        $task->save();

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => 'Successfully created a task',
        ]);


        // $task = new task([
        //     'task' => $request->title,
        //     'user_id' => Auth::id(),
            
        // ]);

        // $task->save();

        // return response()->json(['message' => 'Task created successfully']);


    }


    public function markDone(task $task){

        
        $task->status = 'done';
        $task->save();
        return response()->json(['message' => 'Task marked as done']);
       

    }


    public function markPending(task $task){

         
        $task->status = 'pending';
        $task->save();
        return response()->json(['message' => 'Task marked as pending']);
       
       

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
