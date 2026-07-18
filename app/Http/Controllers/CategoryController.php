<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function createProcess(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name'=>$request->name
        ]);

        Swal::success([
            'title' => 'success']);

        return back();
    }

    //delete process
    public function deleteProcess($id){
        Category::where('id',$id)->delete();
        Swal::success([
            'title' => 'success']);

        return back();

    }

}
