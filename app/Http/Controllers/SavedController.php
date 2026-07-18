<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    //save content
    public function saveContent($userId, $contentId){
        abort_unless(Auth::check(), 401);

        $userId = Auth::id();

        $existing = Saved::where('user_id', $userId)
            ->where('content_id', $contentId)
            ->first();

        // already saved? so delete
        if ($existing) {
            $existing->delete();

            return response()->json([
                'success' => true,
                'saved' => false,
            ], 200);
        }
        // Save မရှိသေးရင် အသစ်ဖန်တီးမယ်
        Saved::create([
            'user_id' => $userId,
            'content_id' => $contentId,
        ]);

        return response()->json([
            'success' => true,
            'saved' => true,
        ], 200);
    }
}
