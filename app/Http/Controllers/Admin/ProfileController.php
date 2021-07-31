<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Hash;

class ProfileController extends Controller {

    /**
     * @name index
     * @author KPO
     */
    public function index() {
        $data['data'] = Auth::user();
        return view("admin.profile.index", $data);
    }

    /**
     * @name update_profile
     * @author KPO
     */
    public function update_profile(Request $request) {
        $data['status'] = false;
        $data['message'] = 'Something went wrong here!';
        if ($request->ajax()) {
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email, ' . Auth::user()->id . ',id'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $data['message'] = 'Please fill the form as per the given instructions.';
            } else {
                $User = User::find(Auth::user()->id);
                $User->first_name = $request->first_name;
                $User->last_name = $request->last_name;
                $User->email = $request->email;
                $User->save();
                $data['status'] = true;
                $data['message'] = 'Profile saved successfully!';
            }
        }
        return response()->json($data);
    }

    /**
     * @name index
     * @uses It will check unique validation for email chages
     * @author KPO
     */
    public function verify_email(Request $request) {
        if (!empty($request->input('email'))) {
            $data = User::where('email', $request->input('email'))->where('id', '!=', Auth::user()->id)->count();
            if ($data > 0) {
                echo false;
            } else {
                echo TRUE;
            }
        } else {
            echo false;
        }
    }

    /**
     * @name update_password
     * @author KPO
     */
    public function update_password(Request $request) {
        $data['status'] = false;
        $data['message'] = 'Something went wrong here!';
        if ($request->ajax()) {
            $rules = array(
                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $data['message'] = 'Please fill the form as per the given instructions.';
            } else {
                $currentPassword = Auth::user()->password;                
                $data['message'] = 'Please enter the correct Current password!';
                if(Hash::check($request->current_password, $currentPassword)) {
                    $User = User::find(Auth::user()->id);
                    $User->password = Hash::make($request->new_password);
                    $User->save();
                    $data['status'] = true;
                    $data['message'] = 'Password changed successfully!';
                }
            }
        }
        return response()->json($data);
    }

}
