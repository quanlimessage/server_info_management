<?php
namespace App\Http\Controllers;
use App\Flight;
use App\Server;
use Auth,DateTime;
use Validator;
use App\Http\Request\ServerAddRequest;

use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function getServer() {
        $data = Server::select('id','name','user','ftp','ssh','password','created_at')->get()->toArray();
		return view('admin.server.server',['server_data' => $data]);
    }

    public function postServerInsert (Request $request){
        $rules = [
                'name' =>'required',
                'user' =>'required',
                'ftp' => 'required',
                'ssh' => 'required',
                'password' => 'required',
            ];
        $messages = [
            'name.required' => 'Name is required.',
            'user.required' => 'User is required.',
            'ftp.required' => 'FTP is required.',
            'ssh.required' => 'SSH is required.',
            'password.required' => 'Password is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $server = new Server;
            $server->name = $request->name;
            $server->user = $request->user;
            $server->ftp = $request->ftp;
            $server->ssh = $request->ssh;
            $server->password = $request->password;
            $server->created_at = new DateTime();
            $server->save();
            return redirect()->back()->with(['flash_message' => 'Success']);
        }
        
    }

    public function postServerUpdate (Request $request){
        $flight = Server::find($request->id);
        $flight->name = $request->name;
        $flight->user = $request->user;
        $flight->ftp = $request->ftp;
        $flight->ssh = $request->ssh;
        $flight->password = $request->password;
        $flight->created_at = new DateTime();
        $flight->save();
        return redirect()->back()->with(['flash_message' => 'Success']);
    }

    public function postServerDelete (Request $request){
        $flight = Server::find($request->id);
        $flight->delete();
        return redirect()->back()->with(['flash_message' => 'Success']);
    }
}
