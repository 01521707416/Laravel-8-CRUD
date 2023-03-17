<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DashBoardController extends Controller
{
    function index()
    {
        return view('tasks.index');
    }

    function users()
    {
        $all_users = User::all();
        $total_users = User::count();
        return view('tasks.users', compact('all_users', 'total_users'));
    }

    function user_delete($user_id)
    {
        User::find($user_id)->delete();
        return back()->with('user_delete', 'User has been deleted successfully!');
    }

    function user_edit($user_id)
    {
        $id = $user_id;
        $user = User::find($id);
        return view('tasks.userUpdate', [
            'id' => $id,
            'user' => $user,
        ]);
    }

    function user_update(Request $request, $user_id)
    {
        $id = $user_id;
        $name = array('name' => $request->name);
        $password = array('password' => bcrypt($request->new_pass));
        $user = User::find($id);
        $user->update($name);

        if ($request->old_pass == null && $request->new_pass == null) {
            return redirect(route('users'))->with('success', 'User information updated successfully!');
        } else {

            if (Hash::check($request->old_pass, $user->password)) {
                if (Hash::check($request->new_pass, $user->password)) {
                    return back()->with('same_pass', 'New password cannot be same as current password!');
                } else {
                    $user->update($password);
                }
            } else {
                return back()->with('wrong_pass', 'Current password is incorrect!');
            }
        }

        return redirect(route('users'))->with('success', 'User information updated successfully!');
    }

    function login()
    {
        return view('tasks.login');
    }
}
