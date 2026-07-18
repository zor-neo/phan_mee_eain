<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\ContentResource;
use App\Models\React;
use App\Models\report;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    //content page
    public function contentPage($find = 'default'){
        $latest = Content::select('contents.id as contentId','contents.title','contents.role','contents.content','contents.link',
                                    'contents.image as contentImage','contents.user_id','contents.category_id','contents.created_at',
                                    'categories.id as categoryId','categories.name as categoryName',
                                    'users.id as userId','users.name as userName','users.image as userImage',
                                    'saveds.user_id as saveUserId','saveds.content_id as saveContentId')
                            ->leftJoin('categories','contents.category_id','categories.id')
                            ->join('users','contents.user_id','users.id')
                            ->leftJoin('saveds','contents.id','saveds.content_id')
                            ->when(request('search') , function($query){ //search by name
                                    $query->whereany(['users.name','contents.title'],'like','%'.request('search').'%');
                                })
                            ->when($find == 'edu' && $find != 'default',function($query){
                                $query->where('contents.role', 'edu');
                            })
                            ->when($find == 'kno' && $find != 'default',function($query){
                                $query->where('contents.role', 'kno' );
                            })
                            ->when($find == Auth::user()->id && $find != 'default',function($query) use($find){
                                $query->where('saveds.user_id', $find );
                            })
                            ->when($find != 'kno' && $find != 'default' && $find != 'edu' && $find != Auth::user()->id , function($query) use($find){
                                $query->where('categories.id', $find );
                            })
                            ->orderBy('contents.created_at','desc')
                            ->paginate(6);

        $contents = $this->countReact();

        $savedContentIds = Saved::where('user_id', Auth::id()) //get all auth user saved contents
            ->pluck('content_id')
            ->toArray();

        $activeReportContentIds = report::where('user_id', Auth::id())
            ->where('role', 1)
            ->where('created_at', '>=', now()->subDay())
            ->pluck('content_id')
            ->toArray();

        $category = Category::get();

        return view('user.home.contentPage',compact('latest','contents','savedContentIds','activeReportContentIds','category','find'));
    }

    private function countReact(){
    return Content::withCount(['likes', 'loves', 'unlikes','comments'])
                    ->with(['reacts.user','comments.user','resources'])
                    ->get()
                    ->keyBy('id');
    }

    public function downloadResource(ContentResource $resource)
    {
        abort_unless(Auth::check(), 401);

        $disk = Storage::disk('local');
        abort_unless($disk->exists($resource->storage_path), 404);

        return $disk->download($resource->storage_path, $resource->original_name);
    }

}
