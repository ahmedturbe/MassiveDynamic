<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function indexAdmin(){
        $users = User::all();
        return view('users.indexAdmin', compact('users'));
    }
    public function indexSecretary(){
        $users = User::all();
        return view('users.indexSecretary', compact('users'));
    }
    public function indexClient(){
        $user_id = \Auth::user()->id;
        //echo $user_id;
        $user = User::where('id', $user_id)->get();
        return view('users.indexClient', compact('user'));
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_id' => ['required', 'alpha_num', 'max:8','min:8', 'unique:users'],
            'contact_person' => ['required', 'string', 'max:255'],
            'role' => ['required', 'alpha_num', 'max:1']
        ]);
        if(!empty($request->file('file')))
            {
                $request->validate([
                    'file' => 'mimes:pdf' // Only allow .pdf file types.
                ]);
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $destinationPath = 'storage/clientDocs/';
                $file->move($destinationPath,$fileName);
            }
        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_id' => $request['user_id'],
            'contact_person' => $request['contact_person'],
            'role' => $request['role'],
            'file' => $fileName
        ]);
        $user->save();
        return back()->with('success','You successfuly added new Client, add another one, or view all');

    }
    public function show($id){
        $user = User::where('id', $id)->get();
        return view('users.show', compact('user'));
    }
    public function edit($id){
        $user = User::where('id', $id)->get();
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user) {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'user_id' => ['required', 'alpha_num', 'max:8','min:8', 'unique:users'],
        'contact_person' => ['required', 'string', 'max:255'],
        'role' => ['required', 'alpha_num', 'max:1']
    ]);
    $input = $request->all();
       // dd($input);
    $user = User::findOrFail($request['id']);
    $user->update($input);
        return redirect('admin');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->destroy($id);
        return redirect('admin');
    }

}
