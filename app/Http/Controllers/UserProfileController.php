<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($username)
    {
        $user = User::where('username', '=', $username)->first();

        return view('pages/profile', [
            'user' => $user,
        ]);
    }
}
