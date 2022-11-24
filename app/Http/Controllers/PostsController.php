<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\posts;
use App\Models\Follower;

class PostsController extends Controller
{
    // 一覧表示
    public function index(Posts $post, Follower $follower)
    {
        $user = auth()->user();
        $follow_ids = $follower->followingIds($user->id);
        
        $following_ids = $follow_ids->pluck('followed_id')->toArray();

        $timelines = $post->getTimelines($user->id, $following_ids);

        return view('posts.index', [
            'user'      => $user,
            'timelines' => $timelines
        ]);
    }

    // 新規入力画面
    public function create()
    {
        $user = auth()->user();

        return view('posts.create', [
            'user' => $user
        ]);
    }

    // 投稿処理
    public function store(Request $request, Posts $post)
    {
        $user = auth()->user();
        $data = $request->all();

        $validator = Validator::make($data, [
            'text' => ['required', 'string', 'max:140']
        ]);
        $validator->validate();

        $post->postStore($user->id, $data);

        return redirect('posts');
    }

    //投稿削除
    public function destroy(Posts $post)
    {
        $user = auth()->user();
        $post->postDestroy($user->id, $post->id);

        return back();
    }
}
