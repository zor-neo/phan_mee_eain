<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function reportProcess(Request $request){
        abort_unless(Auth::check(), 401);

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
        ]);
    }
}
