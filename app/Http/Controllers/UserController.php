<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('images', 's3');
        // Storage::disk('s3')->setVisibility($path, 'images','s3');

        $user = User::create([
            'filename' => $request->image,
            'url' => Storage::disk('s3')->url($path),
        ]);

        return $user;
    }
}
