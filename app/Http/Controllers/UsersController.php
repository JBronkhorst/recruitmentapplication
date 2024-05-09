<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'users' => User::all()
        ]);
    }

    public function toggleAdmin(User $user) {

        if($user->is_admin == 0)
            User::where('id', $user->id)->update(['is_admin' => 1]);
        else{
            User::where('id', $user->id)->update(['is_admin' => 0]);
        }
        
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function search(Request $request)
    {
        $search_query = $request->get('query');
        $users = User::where('id', 'LIKE', '%'.$search_query.'%')
            ->orWhere('email', 'LIKE', '%'.$search_query.'%')->get();

        return view('user.index', compact('users'));
    }
}
