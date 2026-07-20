<?php

namespace App\Http\Controllers;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('admin.home.createAdminFeed');
    }
}
