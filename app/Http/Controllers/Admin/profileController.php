<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class profileController extends Controller
{
   //show profile
   public function showProfile(){
    return view('admin.home.profile');
   }
}
