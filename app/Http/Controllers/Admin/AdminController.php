<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\promote;
use App\Models\report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function deleteUser($id,$image){

        //delete image file
        if($image != null){{
            if(file_exists(public_path('profile/'.$image))){
                // dd(public_path('profile/'.Auth::user()->image));
                unlink(public_path('profile/'.$image));
                };
            }};
        User::where('id',$id)->delete();
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
        report::where('role',1)
                ->where('condition','unSeen')
                ->update([
                    'condition' => 'seen',
                ]);
        return view('admin.home.showAllReport',compact('data'));
    }

    public function allSuggest(){
        $data = report::select('reports.user_id','reports.content_id','reports.message','reports.role','reports.created_at','users.name')
                        ->leftJoin('users','reports.user_id','=','users.id')
                        ->where('reports.role',0)->orderBy('reports.created_at','desc')->get();
        report::where('role',0)
                ->where('condition','unSeen')
                ->update([
                    'condition' => 'seen',
                ]);
        return view('admin.home.showAllSuggest',compact('data'));
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
}
