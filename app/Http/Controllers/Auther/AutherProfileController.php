<?php

namespace App\Http\Controllers\Auther;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SweetAlert2\Laravel\Swal;

class AutherProfileController extends Controller
{
    //playlist page
    public function playlistPage(){
        return view('auther.home.playlist');
    }

    //conetents page
    public function contentPage(){
        $content = Content::select('contents.id as contentId','contents.title','contents.content','contents.role','contents.image','contents.category_id as categoryId','categories.name')
                            ->leftJoin('categories','contents.category_id','=','categories.id')
                            ->where('contents.user_id','=',Auth::user()->id )
                            ->orderBy('contents.created_at','desc')
                            ->paginate(3);
        return view('auther.home.contents',compact('content'));
    }

    //message page
    public function commentPage($para = 'default'){

        //change condition (unseen to seen on comment)
        if($para == 'seen' && $para != 'default'){
            Comment::join('contents','comments.content_id','contents.id')
                    ->where('comments.condition','unSeen')
                    ->whereColumn('comments.content_id','contents.id') //compire column to column. so, use 'whereColumn'
                    ->where('contents.user_id',Auth::user()->id)
                    ->update([
                    'comments.condition' => 'seen',
                    'comments.updated_at' => now(),
                ]);
        }
        $comments =Comment::select('comments.comment','comments.condition','comments.user_id','comments.content_id','comments.created_at',
                                'users.id','users.name','users.image','contents.id as contentId',
                                'contents.title','contents.user_id as contentCreaterId',
                                'categories.name as categoryName')
                            ->join('users','comments.user_id','users.id')
                            ->join('contents','comments.content_id','contents.id')
                            ->join('categories','contents.category_id','categories.id')
                            ->where(function($query){
                                $query->where('comments.content_id','contents.id')
                                        ->orWhere('contents.user_id',Auth::user()->id); })
                            ->orderBy('comments.created_at','desc')
                            ->get();

        return view('auther.home.comment',compact('comments'));
    }

    //create content Page
    public function createContentPage(){
        $data = Category::get();
        return view('auther.home.createContent',compact('data'));

    }

    //create content process
    public function createContentProcess(Request $request){
        // dd($request->all());
        abort_unless(Auth::check(), 401);
        $request->merge(['userId' => Auth::id()]);
        $this->checkContentValidation($request);
        $data = $this->createProcess($request);

        if($request->hasfile('image')){
            $image = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/content/',$image);
            $data['image'] = $image;
        }
        Content::create($data);
        Swal::success([
                'title' => 'Success create Content']);
        return to_route('autherContent#Page');

    }


    //create video content page
    public function createVContentPage(){
        return view('auther.home.createVContent');

    }

    //create Quize content page
    public function createQuizePage(){
        return view('auther.home.createQuize');
    }

    //edit Content Page
    public function editContentPage($id){
        $category = Category::get();
        $content = Content::select('contents.id as contentId','contents.title','contents.content','contents.role','contents.image','contents.category_id as categoryId','categories.name')
                            ->leftJoin('categories','contents.category_id','=','categories.id')
                            ->where('contents.id',$id )
                            ->first();
        return view('auther.home.editContentPage',compact('category','content'));
    }

    //edit Content process
    public function editContentProcess(Request $request){
        abort_unless(Auth::check(), 401);
        $request->merge(['userId' => Auth::id()]);
        $ContentId =  Str::of($request->contentId)->toInteger();
        // dd(is_int($ContentId));
        $this->checkEditContentValidation($request);
        $data = $this->editProcess($request);

        if($request->hasfile('image')){
            if(file_exists(public_path('content/'.$request->oldImage))){
                unlink(public_path('content/'.$request->oldImage));}

            $image = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/content/',$image);
            $data['image'] = $image;

        }else{
            $data['image'] = $request->oldImage;
        }

        Content::where('id',$ContentId)->update($data);
        Swal::success([
                'title' => 'Success create Content']);
        return to_route('autherContent#Page');
        // dd($request->all());
    }

    //delete content process
    public function deleteContentProcess($id,$image){
         //dd('id'.'='.$id);
        $Id = Str::of($id)->toInteger();
        // dd($image);
        Content::where('id',$Id)->delete();
        if(file_exists(public_path('content/'.$image))){
            unlink(public_path('content/'.$image));}
        Swal::success([
                'title' => 'Success delete Content']);
        return to_route('autherContent#Page');

    }

    //check validation for create content
    private function checkContentValidation($request){
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,psv,jpng',
            'object' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);
    }

    //create content process
    private function createProcess($request){
        if($request->has('link')){
            return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object[0],
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => $request->link,
            ];
        }else{
           return [
            'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object[0],
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => null,
            ];
        }
    }

    ////check validation for edit content
    private function checkEditContentValidation($request){
        $request->validate([
            'title' => 'required',
            'object' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);
    }

    //edit content Process
    private function editProcess($request){
        if($request->has('link')){
            return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object[0],
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => $request->link,
            ];
        }else{
           return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object[0],
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => null,
            ];
        }
    }
}
