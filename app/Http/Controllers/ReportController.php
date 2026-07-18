<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    public function reportProcess(Request $request){
        abort_unless(Auth::check(), 401);

        $request->validate([
            'report' => [
                'required',
                Rule::in([
                    'Wrong Information',
                    'Outdated Information',
                    'Missing Context',
                    'Unclear Explanation',
                    'Duplicate Content',
                    'Harassment or Bullying',
                    'Spam',
                ]),
            ],
            'contentId' => ['required', 'integer'],
        ]);

        $existingReport = report::where('user_id', Auth::id())
            ->where('content_id', $request->contentId)
            ->where('role', 1)
            ->latest()
            ->first();

        if ($existingReport && $existingReport->created_at->gt(now()->subDay())) {
            return response()->json([
                'success' => false,
                'cooldown_active' => true,
                'message' => 'You already reported this post. You may report again after 24 hours.',
                'cooldown_until' => $existingReport->created_at->addDay()->toIso8601String(),
            ], 429);
        }

        report::create([
            'role' => 1, //1=report, 0 = suggest
            'message' => $request->report,
            'condition' => 'unSeen',
            'user_id' => Auth::id(),
            'content_id' => $request->contentId,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Reported. Admin is going to check!',
            'cooldown_until' => now()->addDay()->toIso8601String(),
        ]);
    }
}
