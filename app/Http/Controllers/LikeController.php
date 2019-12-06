<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Model\Reply;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }
    public function LikeIt(Reply $reply){
        $reply->like()->create([
           'user_id' => auth()->id()
        ]);
        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }

    public function UnLikeIt(Reply $reply){
        $reply->like->where('user_id', auth()->id())->first()->delete();
        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
