<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Auth;
    
    class HomeController extends Controller
    {
        public function __construct() {
            return redirect('/admin/login');
            $this->middleware('auth',['except' => 'getLogout']);
        }
    
        public function getIndex(Request $request) {
            if (Auth::check()) {
                
                return view('admin.dashboard.main');
            }else{
                return view('admin.login.login');
            }
        }
    
        public function getLogout(Request $request) {
            Auth::logout();
    
            $request->session()->flush();
    
            $request->session()->regenerate();
    
            return redirect('/admin/login');
        }

        protected function guard()
        {
            return Auth::guard('users');
        }
    }
