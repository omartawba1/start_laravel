<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Notifications\NewCommentNotification;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  CommentsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $comment = Comment::create($data);
        $user = $comment->article()->firstOrFail()->user()->firstOrFail();
        $user->notify(new NewCommentNotification($comment->article()->first()));

        return redirect()->back()->with(['msg' => trans('global.added'), 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back()->with(['msg' => trans('global.deleted'), 'type' => 'success']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
