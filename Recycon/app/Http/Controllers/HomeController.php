<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('guestPages.home', ['title' => 'Home']);
    }

    public function re(){
        return redirect('/home');
    }
    public function editprofile(){
        return view('authenticationPages.editprofile', ['title' => 'Edit Profile']);
    }
    public function editprofileLogic(Request $req){
        $user_id = Auth()->user()->id;
        $corresponding_user = User::find($user_id);
        $new_credentials = $req->validate([
            'username' => ['required', 'min:3'],
            'email' => ['email:dns', 'required', 'unique:users']
        ]);
       DB::table('users')->where('id', $corresponding_user['id'])->update(['name' => $new_credentials['username'],
       'email' => $new_credentials['email']]);
       return redirect(route('editprofile'))->with('success', 'Profile sucessfully updated!');
    }
    public function changepassword(){
        return view('authenticationPages.changepassword', ['title' => 'Change Password']);
    }
    public function changepasswordLogic(Request $req){
        $user_id = Auth()->user()->id;
        $corresponding_user = User::find($user_id);
        $hashed_password = Auth::user()->getAuthPassword();
        $old_password = $req['old_pass'];
        if(Hash::check($old_password, $hashed_password)){
            $new_credentials = $req->validate([
                'new_pass' => ['required', 'min:6', 'max:255'],
                'new_pass_re' => ['required', 'same:new_pass']
            ], [
                'new_pass_re.same' => 'Password must match'
            ]);
            DB::table('users')->where('id', $corresponding_user['id'])->update(['password' => Hash::make($new_credentials['new_pass'])]);
            return redirect(route('changepassword'))->with('success', 'Password sucessfully changed!');
        }
        return back()->with('changePasswordError', 'Password Incorrect');
    }

}
