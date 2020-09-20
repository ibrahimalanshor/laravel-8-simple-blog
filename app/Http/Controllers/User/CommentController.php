<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Comment;

class CommentController extends Controller
{
    // Get User
    public function user()
    {
        return Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->user()->comment()->orderBy('id', 'desc')->paginate(10);

        return view('user.comment.index', ['comments' => $comments]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->user()->comment()->findOrFail($id);
        $comment->delete();

        return redirect('user/comment')->with('success', 'Success Delete Comment');
    }
}
