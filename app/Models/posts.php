<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\posts;
use App\Http\Controllers\PostsController;

class posts extends Model
{
    
    use softDeletes;

    protected $guarded = array('id');

    
    public static $rules = array(
        'body' => 'required',
    );

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];


    public function user()
    {
        return $this->belongsTo ('App\Models\User', 'user_id', 'id');
    }

    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id);
        if (is_array($user_id)) {
            count($user_id);
        }
        
        
    }

    public function getPost(Int $post_id)
    {
        return $this->with('user')->where('id', $post_id)->first();
    }

    public function postStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->body = $data['text'];
        $this->save();

        return;
    }

    public function getEditPost(Int $user_id, Int $tweet_id)
    {
        return $this->where('user_id', $user_id)->where('id', $tweet_id)->first();
    }

    public function postUpdate(Int $post_id, Array $data)
    {
        $this->id = $post_id;
        $this->text = $data['text'];
        $this->update();
    }

    public function postDestroy(Int $user_id, Int $post_id)
    {
        return $this->where('user_id', $user_id)->where('id', $post_id)->delete();
    }
}
