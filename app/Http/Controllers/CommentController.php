<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //comment process

    public function commentProcess(Request $request){
        abort_unless(Auth::check(), 401);

        $comment = Comment::create([
                    'comment' => $request->comment,
                    'condition' => 'unSeen',
                    'user_id' => Auth::id(),
                    'content_id' => $request->contentId,
        ]);

        $comment->load('user');   // user data ပါ ယူမယ်

        $commentCount = Comment::where('content_id', $request->contentId)->count();

        return response()->json([
            'comment_count' => $commentCount,
            'comment' => [
                'id'         => $comment->id,
                'user_id'    => $comment->user_id,
                'user_name'  => $comment->user->name ?? 'Unknown',
                'comment'    => $comment->comment,
                'created_at' => $comment->created_at->diffForHumans(),
            ],
        ]);
    }
    public function commentDelete($commentId){
        $comment = Comment::find($commentId);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        if ($comment->user_id != Auth::id() && Auth::user()->role != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $contentId = $comment->content_id;
        $comment->delete();

        $commentCount = Comment::where('content_id', $contentId)->count();

        return response()->json([
        'comment_count' => $commentCount,
        ]);
    }
}
