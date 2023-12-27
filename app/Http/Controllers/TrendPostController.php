<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{   //direct trend posts
    public function index(){
        $posts = ActionLog::select('action_logs.*','posts.*',DB::raw('COUNT(action_logs.post_id) as post_count'))
                ->leftJoin('posts','action_logs.post_id','posts.id')
                ->groupBy('action_logs.post_id')
                ->get();

        return view('admin.trend_posts.index',compact('posts'));

    }
    public function trendPostDetails($id){
        $post = Post::where('id',$id)->first();
        return view('admin.trend_posts.details',compact('post'));
    }
}
