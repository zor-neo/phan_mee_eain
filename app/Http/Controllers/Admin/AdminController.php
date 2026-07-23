<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\promote;
use App\Models\report;
use App\Models\User;
use App\Support\ContentDisplayCache;
use App\Support\UploadedMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use SweetAlert2\Laravel\Swal;

class AdminController extends Controller
{
    public function adminHome(){
        $user = User::where('role','user')->get();
        $author = User::where('role','author')->get();
        $content = Content::get();
        $report = report::where('role', 1 ) // 1 = report , 0 = suggestion
                        ->where('condition','unSeen')
                        ->get();
        $suggest = report::where('role', 0 ) // 1 = report , 0 = suggestion
                        ->where('condition','unSeen')
                        ->get();
        $promote = promote::where('condition',1)->get(); // 1 = user satuation ,0= author satuation
        $category = Category::get();

        $AutWithCont = Content::select('user_id', DB::raw('count(*) as total')) //'select' , 'row' method for use to find diff id in created posts....
                        ->groupBy('user_id')
                        ->get();
        // $lastContPost = Content::latest('created_at')->first();
        return view('admin.home.dashboard',compact('user','author','content','report','promote','category','AutWithCont','suggest'));
    }


    //see all user
    public function allUser(){
        $data = User::where('role','user')->orderBy('created_at','desc')->get();
        return view('admin.home.showAllUser',compact('data'));
    }

    //delete user process
    public function deleteUser($id, $image = null, ?ContentDisplayCache $cache = null){
        $cache = $cache ?? app(ContentDisplayCache::class);
        $user = User::findOrFail($id);

        abort_if($user->isSuperAdmin(), 403);
        abort_if(Auth::id() === $user->id, 403);

        //delete image file
        UploadedMedia::delete('profile', $image);

        $user->delete();
        $cache->bumpVersion();
        Swal::success([
            'title' => 'Success Message',
            'text'=>'Delete Success']);

        return back();
    }

    //see all author
    public function allAuthor(){
        $data = User::where('role','author')
                    ->when(request('search') , function($query){ //search by name & id
                        $query->whereany(['id','name'],'like','%'.request('search').'%');
                            })
                    ->orderBy('created_at','desc')->get();
        return view('admin.home.showAlladmin',compact('data'));
    }

    public function accessControl()
    {
        abort_unless(Auth::user()?->isSuperAdmin(), 403);

        $data = User::query()
            ->where('role', '!=', User::ROLE_SUPERADMIN)
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function ($query) use ($search) {
                    $query->where('id', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('role')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.home.accessControl', compact('data'));
    }

    public function updateAccess(Request $request, User $user)
    {
        abort_unless(Auth::user()?->isSuperAdmin(), 403);
        abort_if($user->isSuperAdmin(), 403);

        $validated = $request->validate([
            'role' => ['required', Rule::in([
                User::ROLE_USER,
                User::ROLE_AUTHOR,
                User::ROLE_ADMIN,
            ])],
        ]);

        $user->update([
            'role' => $validated['role'],
        ]);

        if ($validated['role'] !== User::ROLE_AUTHOR) {
            promote::where('user_id', $user->id)->update([
                'condition' => 0,
            ]);
        }

        Swal::info([
            'title' => 'Access Updated',
            'text' => 'The account role has been updated.',
        ]);

        return to_route('accessControlPage');
    }

    //demote process
    public function demoteProcess($id){
        User::where('id',$id)->where('role','author')->update([
            'role' => 'user',
        ]);
        Swal::info([
            'title' => 'Success Message',
            'text'=>'This user has become user("user role")']);

        return back();
    }

    //see all report
    public function allReport(){
        $data = report::select('reports.user_id','reports.content_id','reports.message','reports.role','reports.created_at','users.name')
                        ->leftJoin('users','reports.user_id','=','users.id')
                        ->where('reports.role',1)->orderBy('reports.created_at','desc')->get();
        return view('admin.home.showAllReport',compact('data'));
    }

    public function markReportsSeen()
    {
        report::where('role',1)
                ->where('condition','unSeen')
                ->update([
                    'condition' => 'seen',
                ]);

        return back();
    }

    public function allSuggest(){
        $data = report::select('reports.user_id','reports.content_id','reports.message','reports.role','reports.created_at','users.name')
                        ->leftJoin('users','reports.user_id','=','users.id')
                        ->where('reports.role',0)->orderBy('reports.created_at','desc')->get();
        return view('admin.home.showAllSuggest',compact('data'));
    }

    public function markSuggestionsSeen()
    {
        report::where('role',0)
                ->where('condition','unSeen')
                ->update([
                    'condition' => 'seen',
                ]);

        return back();
    }

    //promotion page
    public function requestToPromo(){
        $data = promote::select('promotes.user_id','promotes.condition',
                                'users.name','users.id as userId','users.image','users.created_at','users.email','users.role')
                        ->join('users','promotes.user_id','users.id')
                        ->where('promotes.condition', 1 ) // 1 = user satuation ,0= author satuation
                        ->orderBy('promotes.created_at','desc')
                        ->get();
        return view('admin.home.showAllRequestPromo',compact('data'));
    }

    //promote process
    public function promotion($id){
        //dd($id);

        promote::where('user_id',$id * 1)->update([
            'condition' => 0, // 1 = user satuation ,0= author satuation
        ]);
        User::where('id',$id * 1)->where('role', 'user')->update([
            'role' => 'author',
        ]);
        Swal::info([
        'title' => 'Success Message',
        'text'=>'This user has become Author("Author role")']);


        return back();
    }

    //see reported Page
    public function reportedContent($id){
        $data = Content::where('id',$id)->first();
        return view('admin.home.reportedContentPage',compact('data'));
    }

    public function switchViewMode(Request $request)
    {
        abort_unless(Auth::check() && Auth::user()->isAdminRole(), 403);

        $request->validate([
            'mode' => ['required', 'in:admin,user,author_readonly'],
        ]);

        session(['acting_view_mode' => $request->mode]);

        return match ($request->mode) {
            'user' => to_route('userHome'),
            'author_readonly' => to_route('auther#Room'),
            default => to_route('adminHome'),
        };
    }

    public function resetViewMode()
    {
        abort_unless(Auth::check() && Auth::user()->isAdminRole(), 403);

        session(['acting_view_mode' => 'admin']);

        return to_route('adminHome');
    }
}
