<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    # LIKE
    public function store($post_id)
    {
        $this->like->user_id = Auth::user()->id; // who liked the post
        $this->like->post_id = $post_id; // which post was liked
        $this->like->save();

        return redirect()->back();
    }

    # UNLIKE
    public function destroy($post_id)
    {
        $this->like->where('user_id', Auth::user()->id)
                ->where('post_id', $post_id)
                ->delete();

        return redirect()->back();
    }
}
