<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use App\Reply;
use Session;

class RepliesController extends Controller
{
    //
    public function like($id)
    {
        Like::create([
            'user_id' => Auth::id(),
            'reply_id' => $id
        ]);

        Session::flash('success', 'You liked the reply');

        return  redirect()->back();
    }

    public function unlike($id)
    {
        $reply = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $reply->delete();

        Session::flash('success', 'You unliked the reply');

        return  redirect()->back();

    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session::flash('success', 'Reply has been marked as the best answer');

        return  redirect()->back();
    }

    public function edit($id)
    {
        return view('replies.edit', ['reply'=>Reply::find($id)]);
    }

    public function update($id)
    {
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $r = Reply::find($id);
        $r->content = request()->content;
        $r->save();

        Session::flash('success', 'Reply has been updated');

        return  redirect()->route('discussion', ['slug'=>$r->discussion->slug]);
    }
}
