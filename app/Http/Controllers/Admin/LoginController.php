<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,
    Redirect,
    Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User,
    App\Models\ResetPasswordModel;

class LoginController extends Controller {

    public function __construct() {
        
    }

    /**
     * @name index
     * @author KPO
     */
    public function index() {
        return view("admin.login.index");
    }

    /**
     * @name doLogin
     * @uses Catch login form submission and manage auth process
     * @author KPO
     */
    public function doLogin(Request $request) {
        $data['status'] = false;
        $data['message'] = 'Something went wrong here!';

        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['message'] = 'Both fields are required with a valid email!';
        } else {
            $data['message'] = 'Please enter a valid login credentials!';
            $remember_me = $request->has('remember_me') ? true : false;
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1], $remember_me)) {
                $data['status'] = true;
                $data['url'] = route('admin.dashboard');
                $data['message'] = 'Welcome, You have login successfully!';
            }
        }
        return response()->json($data);
    }

    /**
     * @name doLogin
     * @uses Catch logout request and manage auth process for logout
     * @author KPO
     */
    public function logout(Request $request) {
        Auth::logout();
        return Redirect::to(route('admin.login'));
    }

    /**
     * @name forgot_password
     * @author KPO
     */
    public function forgot_password() {
        return view("admin.login.forgot_password");
    }

    /**
     * @name reset_password
     * @uses Catch the forgot password form submission and proceed to send mail
     * @author KPO
     */
    public function reset_password(Request $request) {
        $data['status'] = false;
        $data['message'] = 'Something went wrong here!';
        if ($request->ajax() && !empty($request->email)) {
            $data['message'] = 'Unauthenticated email address!';
            $User = User::where('email', $request->email)->first();
            if (!empty($User)) {
                $ResetPassword = ResetPasswordModel::where('email', $request->email)->first();
                if (empty($ResetPassword)) {
                    $ResetPassword = new ResetPasswordModel();
                    $ResetPassword->email = $request->email;
                    $ResetPassword->token = str_random(60);
                    $ResetPassword->created_at = date('Y-m-d H:i:s');
                    $ResetPassword->save();
                }
                $token = $ResetPassword->token;
                $Subject = 'Reset Password Notification';
                $link = env('APP_URL') . '/password/reset/' . $token . '?email=' . urlencode($request->email);
                $MailInfo = ['url' => $link, 'to' => $request->email, 'subject' => $Subject, 'first_name' => $User->first_name];
                $data['message'] = 'A Network Error occurred. Please try again.';
                if (!empty($this->send_reset_password_mail($MailInfo))) {
                    $data['status'] = true;
                    $data['message'] = 'A reset link has been sent to your email address.';
                }
            }
        }
        return response()->json($data);
    }

    /**
     * @name reset_password
     * @author KPO
     */
    public function send_reset_password_mail($MailInfo = []) {
        try {
            \Mail::send('admin.emails.reset_password_mail', $MailInfo, function ($m) use ($MailInfo) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $m->to($MailInfo['to'], $MailInfo['to'])->subject($MailInfo['subject']);
            });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @name reset_password
     * @uses Catch the on click event of reset password mail link and load the form
     * @author KPO
     */
    public function validate_password_request(Request $request) {
        $tokenData = ResetPasswordModel::where(['email' => $request->email, 'token' => $request->token])->first();
        if (!empty($tokenData)) {
            return view("admin.login.reset_password");
        }
        return view("admin.errors.404");
    }

    /**
     * @name reset_password
     * @author KPO
     */
    function save_reset_password(Request $request) {
        $data['status'] = false;
        $data['message'] = 'Something went wrong here!';
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                        'email' => 'required|email|exists:users,email',
                        'password' => 'required|same:password',
                        'confirm_password' => 'required|same:password',
                        'token' => 'required']);
            if ($validator->fails()) {
                $data['message'] = 'Something went wrong with password';
            } else {
                $password = $request->password;
                $tokenData = ResetPasswordModel::where(['email' => $request->email, 'token' => $request->token])->first();
                if (!empty($tokenData)) {
                    $user = User::where('email', $tokenData->email)->first();
                    if (!empty($user)) {
                        $user->password = \Hash::make($password);
                        $user->save();
                        ResetPasswordModel::where(['email' => $user->email, 'token' => $request->token])->delete();
                        $data['status'] = true;
                        $data['message'] = 'Congratulations, Your password reset successfully!';
                        $data['url'] = route('admin.login');
                    }
                }
            }
        }
        return response()->json($data);
    }

}
