<?php
    namespace App\Http\Controllers;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\MessageBag;
    use Validator;
    use Auth;
    class LoginController extends Controller
    {
        public function getLogin() {
            return view('admin.login.login');
        }
        public function postLogin(Request $request) {
            $rules = [
                'email' =>'required|email',
                'password' => 'required|min:8'
            ];
            $messages = [
                'email.required' => 'Email is required.',
                'email.email' => 'Invalid email address.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must contain at least 8 characters.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $email = $request->input('email');
                $password = $request->input('password');
    
                if( Auth::attempt(['email' => $email, 'password' =>$password], $request->has('remember'))) {
                    return redirect()->intended('admin');
                } else {
                    $errors = new MessageBag(['errorlogin' => 'Email or passwords not correct.']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
        }
    }
