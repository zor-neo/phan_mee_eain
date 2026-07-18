<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\promote;
use App\Models\report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SweetAlert2\Laravel\Swal;

class UserProfileController extends Controller
{
    //to edit profile Page
    public function editPage(){
        return view('user.home.editProfile');
    }

    //edit process
    public function editProcess(Request $request){
         $this->editValidateProcess($request);
         $data = $this->insertProcess($request);

         //add image file
         if($request->hasfile('image')){
            //delete image file
            if(Auth::user()->image != null){{
                if(file_exists(public_path('profile/'.Auth::user()->image))){
                    // dd(public_path('profile/'.Auth::user()->image));
                    unlink(public_path('profile/'.Auth::user()->image));
                };
            }}

            $image = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/profile/',$image);
            $data['image'] = $image;


         }else{
            $data['image'] = Auth::user()->image;
         }

         //update data to database
         User::where('id',auth()->user()->id)->update($data);

         Swal::success([
                'title' => 'Success Message',
                'text'=>'You have successful update profile']);

         return to_route('profile#Page');

    }

    //to user profile page
    public function profilePage(){
        $data = User::get();
        return view('user.home.viewProfile',compact('data'));
    }

    //to change password page
    public function ChPassPage(){
        return view('user.home.changePassword');
    }

    //change password process
    public function ChPassProcess(Request $request){
        $this->chPassCheckValidate($request);

        //check to match $request->oldpass and database->oldpass
        $getOldPass = Auth::user()->password;
        if(Hash::check($request->oldPassword, $getOldPass)){
          $data['password'] =  Hash::make($request->newPassword);
          User::where('id',Auth::user()->id)->update($data);
        }
        Swal::success([
                'title' => 'Success Message',
                'text'=>'You have successful update password']);
        return to_route('userHome');

    }

    //request to promote page
    public function promotePage(){
        return view('user.home.toPromote');
    }

    //promote process
    public function promoteProcess(Request $request){
        abort_unless(Auth::check(), 401);
        $request->merge(['userId' => Auth::id()]);
        $this->checkPromotevalidation($request);

        promote::create([
            'user_id' => Auth::id(),
            'condition' => 1 // 1 = request , 0 = done(promoted)
        ]);

        Swal::success([
                'title' => 'Success Message',
                'text'=>'Sent your request']);
        return redirect('/user/home');
    }

    //switch role

    public function switchProcess(){
            if(Auth::user()->email == 'superadmin@gmail.com'){
               if (Auth::user()->role == 'author'){
                User::where('id',Auth::user()->id)
                ->update(['role' => 'admin']);

                Swal::success([
                    'title' => 'Now, you are admin role!']);
                return to_route('adminHome');
            }
            }else{
                    Swal::warning([
                    'title' => 'Warning Message',
                    'text'=>'Opp! Sorry, You are not a admin']);
                    return back();
                }
            if(Auth::user()->email == 'superadmin@gmail.com' && Auth::user()->role == 'admin'){
                User::where('id',Auth::user()->id)
                ->update(['role' => 'author']);

                Swal::success([
                    'title' => 'Now, you are auther role!']);
                return to_route('userHome');
                }
    }

    //auther room
    public function autherRoom(){
        $userContent = Content::where('user_id',Auth::user()->id)->get();

        $comments =Comment::select('comments.comment','comments.condition','comments.user_id','comments.content_id','comments.created_at',
                                'users.id','users.name','users.image','contents.id as contentId','contents.title','contents.user_id as contentCreaterId')
                            ->join('users','comments.user_id','users.id')
                            ->join('contents','comments.content_id','contents.id')
                            ->where('comments.condition','unSeen')
                            ->where(function($query){
                                $query->where('comments.content_id','contents.id')
                                        ->orWhere('contents.user_id',Auth::user()->id); })
                            ->orderBy('comments.created_at','desc')
                            ->get();


        $videoContent = Content::where('user_id',Auth::user()->id)
                                ->where('link','null')->get();
        return view('auther.home.dashboard',compact('userContent','videoContent','comments'));
    }

    //suggesstion page
    public function SuggestionPage(){
        return view('user.home.suggestion');
    }
    //suggestion process
    public function SuggestionProcess(Request $request){
        $request->validate([
            'suggest' => 'required|min:50',
        ]);

        report::create([
            'role' => 0, //0 =suggestion , 1 = report
            'condition' => 'unSeen',
            'message' => $request->suggest,
            'user_id' => Auth::user()->id,
            'content_id' => 0, //content is nothing
        ]);

        Swal::success([
                'title' => 'Success Message',
                'text'=>'Send']);
        return back();

    }


    //validate profile
    private function editValidateProcess($request){
        if(Auth::user()->email == 'superadmin@gmail.com' && Auth::user()->name == 'SuperAdmin'){
            $request->validate([
            'phone'=>'required|string|max:30',
            'address'=>'required',
            'status'=>'required',
            'image'=>'mimes:png,jpg,jpeg,svg|file'
        ]);
        }else{
            $request->validate([
            'name'=>'required|max:30|min:6',
            'email'=>'required|unique:users,email,'.Auth::user()->id,
            'phone'=>'required|string|max:30',
            'address'=>'required',
            'status'=>'required',
            'image'=>'mimes:png,jpg,jpeg,svg|file'
        ]);
        }
    }
    private function insertProcess($request){
         if(Auth::user()->email == 'superadmin@gmail.com' && Auth::user()->name == 'SuperAdmin'){
            return[
                'address'=>$request->address,
                'phone'=>$request->phone,
                'bio'=>$request->status,
                ];
         }else{
            return[
                'name'=>$request->name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'bio'=>$request->status,
                'role'=>'user',
            ];
         }
    }

    //check validate change password
    private function chPassCheckValidate($request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword|min:6|max:12',
        ]);
    }
    //check validate promote process
    private function checkPromotevalidation($request){
        $request->validate([
            'userId' => 'unique:promotes,user_id',
            'check1' => 'required',
            'check2' => 'required',
            'check3' => 'required',
            'check4' => 'required'
        ],[
            'userId' => 'You have already been requested !',
            'check1.required' => 'This field is required',
            'check2.required' => 'This field is required',
            'check3.required' => 'This field is required',
            'check4.required' => 'This field is required',

        ]);
    }
}
