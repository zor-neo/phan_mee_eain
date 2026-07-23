<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Support\ContentDisplayCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SweetAlert2\Laravel\Swal;

class CategoryController extends Controller
{
    //category page
    public function categoryPage(){
        $data = Category::orderBy('created_at','desc')
                ->get();



        return view('admin.category.categories',compact('data'));
    }

    //create process
    public function createProcess(Request $request, ?ContentDisplayCache $cache = null){
        $cache = $cache ?? app(ContentDisplayCache::class);
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name'=>$request->name
        ]);
        $cache->bumpVersion();

        Swal::success([
            'title' => 'success']);

        return back();
    }

    //delete process
    public function deleteProcess($id, ?ContentDisplayCache $cache = null){
        $cache = $cache ?? app(ContentDisplayCache::class);
        Category::where('id',$id)->delete();
        $cache->bumpVersion();
        Swal::success([
            'title' => 'success']);

        return back();

    }

}
