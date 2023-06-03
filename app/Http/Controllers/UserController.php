<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $file = $request->file('image');
        $path = $file->store('images', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        $user = User::create([
            'image' => $file->getClientOriginalName(),
            'url' => Storage::disk('s3')->url($path),
        ]);

        return $user;
    }
}
