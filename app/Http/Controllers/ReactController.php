<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\React;
use App\Support\ContentDisplayCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactController extends Controller
{
    //react
    public function reactionProcess($userId,$contentId,$react, ?ContentDisplayCache $cache = null){
        $cache = $cache ?? app(ContentDisplayCache::class);
        abort_unless(Auth::check(), 401);

        $userId = Auth::id();

        $hasReact = React::where('user_id', $userId)
            ->where('content_id', $contentId)
            ->first();

        if (!$hasReact) {
            React::create([
                'user_id'    => $userId,
                'content_id' => $contentId,
                'react'       => $react
            ]);

        } elseif ($hasReact->react == $react) {
            $hasReact->delete();   // compare string to string that is why using '3 equal to'..we can advoid bug and other error...

        } else {
            $hasReact->update([
                'react' => $react,
            ]);
        }
        $cache->bumpVersion();
        //count react in single content
        $counts = Content::withCount(['likes', 'loves', 'unlikes'])
                        ->where('id', $contentId)
                        ->first();

        //take all user data from reaction maker at single content
        $reactList = React::with('user')
                       ->where('content_id', $contentId)
                       ->latest()
                       ->get()
                       ->map(function ($react) {
                           return [
                               'user_name' => $react->user->name ?? 'Unknown',
                               'react'     => (int) $react->react,
                           ];
                       });

         // check current react state
        $myReact = React::where('user_id', $userId)
                     ->where('content_id', $contentId)
                     ->first();

        return response()->json([
            'likes_count'   => $counts->likes_count,
            'loves_count'   => $counts->loves_count,
            'unlikes_count' => $counts->unlikes_count,
            'total_count'   => $counts->likes_count + $counts->loves_count + $counts->unlikes_count,
            'react_list'    => $reactList,
            'my_react'      => $myReact ? (int) $myReact->react : null,
        ]);
    }
}
