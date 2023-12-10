<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (view()->exists($id)) {
            return view($id);
        } else {
            return view('404');
        }

    }


    public function user()
    {
        $users = User::latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function user_update(User $user)
    {

        if ($user->role != 'admin') {
            $user->role = 'admin';
            $user->save();
            return redirect()->back();
        } else {
            $user->role = 'user';
            $user->save();
            return redirect()->back();
        }
    }
}
