<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{   //set action log
   public function setActionLog(Request $request){
        $data = [
            'user_id'=>$request->user_id,
            'post_id' => $request->post_id,
        ];
        ActionLog::create($data);
        $posts = ActionLog::where('post_id',$request->post_id)->get();
        return response()->json([
            'posts' => $posts,
            'message' => 'action log create success',
        ]);

    }
}
