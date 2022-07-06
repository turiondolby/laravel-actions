<?php

namespace App\Http\Controllers;

use App\Actions\CreatePost;
use Illuminate\Http\Request;

class PostStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $this->validate($request, [
            'body' => 'required'
        ]);

        CreatePost::run($request->user(), $data);

        return back();
    }
}
