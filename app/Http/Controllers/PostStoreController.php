<?php

namespace App\Http\Controllers;

use App\Actions\CreatePost;
use Illuminate\Http\Request;

class PostStoreController extends Controller
{
    public function __invoke(Request $request, CreatePost $createPost)
    {
        $data = $this->validate($request, [
            'body' => 'required'
        ]);

        $createPost->run($request->user(), $data);

        return back();
    }
}
