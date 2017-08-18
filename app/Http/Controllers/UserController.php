<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Flight;
use Illuminate\Support\MessageBag;
use Validator;
use Auth;
use App\User;
use DateTime,File,Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser() {
        $data = User::select('id','name','email','password','image','level','menu')->get()->toArray();
		return view('admin.user.user',['user_data' => $data]);
    }

    public function CreateUser(Request $request) {
        $rules = [
                'name' =>'required',
                'email' =>'required|email',
                'password' => 'required|min:8',
                'password2' => 'required|min:8|same:password',
                'menu' =>'required'
            ];
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must contain at least 8 characters.',
            'password2.required' => 'Password2 is required.',
            'password2.min' => 'Password2 must contain at least 8 characters.',
            'password2.same' => 'Password1 and Password2 must match.',
            'menu.required' => 'Menu is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $user->level = $request->level;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->menu = implode(",",$request->menu);
            $user->password = bcrypt($request->password);
            if($request->file('img')){
                $file = $request->file('img');
                if(strlen($file->getClientOriginalName()) > 0){
                    $filename = time().'.'.$file->getClientOriginalName();
                    $des = "upload/user/";
                    $file->move($des,$filename);
                    $user->image = $filename;
                }
            }
            $user->created_at = new DateTime();
            $user->save();
            return redirect()->back()->with(['flash_message' => 'Success']);
        }
    }

    public function DeleteUser(Request $request) {
        if(Auth::user()->level > $request-> level || Auth::user()->level == 1){
            $flight = User::find($request->id);
            if(file_exists('upload/user/'.$flight->image)){
                File::delete('upload/user/'.$flight->image);
            }
            $flight->delete();
            return redirect()->back()->with(['flash_message' => 'Success']);
        }else{
            return redirect()->back()->with(['flash_error' => 'Not allowed']);
        }
    }

    public function EditUser(Request $request) {
        if(Auth::user()->level >= $request-> level || Auth::user()->id == $request->id){
            $rules = [
                    'name' =>'required',
                    'email' =>'required|email',
                    'password' => 'required|min:8',
                    'password2' => 'required|min:8|same:password',
                    'menu' =>'required'
                ];
            $messages = [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Invalid email address.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must contain at least 8 characters.',
                'password2.required' => 'Password2 is required.',
                'password2.min' => 'Password2 must contain at least 8 characters.',
                'password2.same' => 'Password1 and Password2 must match.',
                'img.required' => 'image is required.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else{
                $flight = User::find($request->id);
                if(file_exists('upload/user/'.$flight->image)){
                    File::delete('upload/user/'.$flight->image);
                }
                if($request->file('img')){
                    $file = $request->file('img');
                    if(strlen($file->getClientOriginalName()) > 0){
                        $filename = time().'.'.$file->getClientOriginalName();
                        $des = "upload/user/";
                        $file->move($des,$filename);
                        $flight->image = $filename;
                    }
                }
                $flight->level = $request->level;
                $flight->menu = implode(",",$request->menu);
                $flight->name = $request->name;
                $flight->email = $request->email;
            
                $flight->save();
                return redirect()->back()->with(['flash_message' => 'Success']);
            }
        }else{
            return redirect()->back()->with(['flash_error' => 'Not allowed']);
        }
    }
}
