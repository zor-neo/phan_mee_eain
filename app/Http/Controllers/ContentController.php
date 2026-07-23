<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\ContentResource;
use App\Models\React;
use App\Models\report;
use App\Models\Saved;
use App\Support\ContentDisplayCache;
use App\Support\UploadedMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    //content page
    public function contentPage(?ContentDisplayCache $cache = null, $find = 'default'){
        $cache = $cache ?? app(ContentDisplayCache::class);
        $search = trim((string) request('search', ''));
        $page = (int) request('page', 1);

        $latest = $cache->rememberLatest([
            'find' => $find,
            'search' => $search,
            'page' => $page,
        ], function () use ($find) {
            return Content::select('contents.id as contentId','contents.title','contents.role','contents.content','contents.link',
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
        });

        $contentIds = $latest->getCollection()->pluck('contentId')->values()->all();

        $contents = $contentIds === []
            ? collect()
            : $cache->rememberCards([
                'find' => $find,
                'search' => $search,
                'page' => $page,
                'content_ids' => $contentIds,
            ], function () use ($contentIds) {
                return $this->countReact($contentIds);
            });

        $savedContentIds = Saved::where('user_id', Auth::id()) //get all auth user saved contents
            ->pluck('content_id')
            ->toArray();

        $activeReportContentIds = report::where('user_id', Auth::id())
            ->where('role', 1)
            ->where('created_at', '>=', now()->subDay())
            ->pluck('content_id')
            ->toArray();

        $category = $cache->rememberCategories(function () {
            return Category::get();
        });

        return view('user.home.contentPage',compact('latest','contents','savedContentIds','activeReportContentIds','category','find'));
    }

    private function countReact(array $contentIds = []){
        return Content::withCount(['likes', 'loves', 'unlikes','comments'])
                    ->with(['reacts.user','comments.user','resources'])
                    ->whereIn('contents.id', $contentIds)
                    ->get()
                    ->keyBy('id');
    }

    public function downloadResource(ContentResource $resource)
    {
        abort_unless(Auth::check(), 401);

        $disk = UploadedMedia::disk();
        abort_unless($disk->exists($resource->storage_path), 404);

        return $disk->download($resource->storage_path, $resource->original_name);
    }

}
