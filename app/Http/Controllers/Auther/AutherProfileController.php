<?php

namespace App\Http\Controllers\Auther;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use App\Models\ContentResource;
use App\Support\UploadedMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
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

    public function markCommentsSeen()
    {
        Comment::join('contents','comments.content_id','contents.id')
            ->where('comments.condition','unSeen')
            ->whereColumn('comments.content_id','contents.id')
            ->where('contents.user_id',Auth::user()->id)
            ->update([
                'comments.condition' => 'seen',
                'comments.updated_at' => now(),
            ]);

        return to_route('comment#Page');
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
            $data['image'] = UploadedMedia::store($request->file('image'), 'content');
        } else {
            $data['image'] = null;
        }
        $content = Content::create($data);
        $this->storeResources($request, $content);
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
            UploadedMedia::delete('content', $request->oldImage);
            $data['image'] = UploadedMedia::store($request->file('image'), 'content');

        }else{
            $data['image'] = $request->oldImage ?: null;
        }

        Content::where('id',$ContentId)->update($data);
        $content = Content::findOrFail($ContentId);
        $this->storeResources($request, $content);
        Swal::success([
                'title' => 'Success create Content']);
        return to_route('autherContent#Page');
        // dd($request->all());
    }

    //delete content process
    public function deleteContentProcess($id, $image = null){
         //dd('id'.'='.$id);
        $Id = Str::of($id)->toInteger();
        $content = Content::with('resources')->find($Id);

        if (! $content) {
            return to_route('autherContent#Page');
        }

        foreach ($content->resources as $resource) {
            UploadedMedia::disk()->delete($resource->storage_path);
        }

        $content->delete();
        UploadedMedia::delete('content', $image);
        Swal::success([
                'title' => 'Success delete Content']);
        return to_route('autherContent#Page');

    }

    //check validation for create content
    private function checkContentValidation($request){
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|mimes:png,jpg,jpeg,webp,gif',
            'object' => 'required',
            'category' => 'required',
            'content' => 'required',
            'link' => 'nullable|url',
            'resources' => 'nullable|array',
            'resources.*' => 'file|mimes:png,jpg,jpeg,webp,gif,mp4,mov,avi,mkv,pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip|max:5120',
        ]);

        $this->validateResourceSize($request);
    }

    //create content process
    private function createProcess($request){
        if($request->filled('link')){
            return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object,
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => $request->link,
            ];
        }else{
           return [
            'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object,
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
            'link' => 'nullable|url',
            'resources' => 'nullable|array',
            'resources.*' => 'file|mimes:png,jpg,jpeg,webp,gif,mp4,mov,avi,mkv,pdf,doc,docx,ppt,pptx,xls,xlsx,txt,zip|max:5120',
        ]);

        $this->validateResourceSize($request);
    }

    //edit content Process
    private function editProcess($request){
        if($request->filled('link')){
            return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object,
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => $request->link,
            ];
        }else{
           return [
                'title' => $request->title,
                'category_id' => $request->category,
                'role' => $request->object,
                'user_id'=>Auth::id(),
                'content' => $request->content,
                'link' => null,
            ];
        }
    }

    private function validateResourceSize(Request $request): void
    {
        $files = $request->file('resources', []);
        $totalSize = 0;

        foreach ($files as $file) {
            $totalSize += $file->getSize();
        }

        if ($totalSize > 10 * 1024 * 1024) {
            throw ValidationException::withMessages([
                'resources' => 'The total resource size must be 10 MB or less.',
            ]);
        }
    }

    private function storeResources(Request $request, Content $content): void
    {
        if (! $request->hasFile('resources')) {
            return;
        }

        foreach ($request->file('resources') as $file) {
            if (! $file->isValid()) {
                continue;
            }

            $storagePath = UploadedMedia::storeResource($file);

            ContentResource::create([
                'content_id' => $content->id,
                'original_name' => $file->getClientOriginalName(),
                'storage_path' => $storagePath,
                'mime_type' => $file->getMimeType() ?: 'application/octet-stream',
                'extension' => strtolower($file->getClientOriginalExtension() ?: ''),
                'size_bytes' => $file->getSize(),
            ]);
        }
    }
}
