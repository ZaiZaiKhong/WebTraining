<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getIndex(Request $request){
        if($request->search == null) {
             $users = DB::table('users')->paginate(5);
        } else {
            $users = DB::table('users')
                ->where('fullname', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }
        return view('/users/index')->with('users', $users);
    }

    public function getForm($id = 0){
        $users = User::find($id);
        return view('/users/form')->with('users', $users);
    }

    public function postForm(Request $request, $id = null){
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email',
            'picture' => 'required|image',
            'dob' => 'required',
            'gender' => 'required',
            'standard' => 'required',
        ]);

        $image = $request->file('picture');
        $image_name = $image->getClientOriginalName();

        $image->move('image' , $image_name);

        if($id == null)
        {
            $user = new User();

            $user->fullname = $request['fullname'];
            $user->email = $request['email'];
            $user->picture = $image_name;
            $user->dob = $request['dob'];
            $user->gender = $request['gender'];
            $user->standard = $request['standard'];

            $user->save();
        }
        else {
            User::where('id', $id)->update(array(
                'fullname' => $request['fullname'],
                'email' => $request['email'],
                'picture' => $image_name,
                'dob' => $request['dob'],
                'gender' => $request['gender'],
                'standard' => $request['standard'],
            ));
        }
        return redirect('/');
    }

    public function delete($id = 0){
        User::where('id', $id)->delete();
        return redirect('/');
    }
}
