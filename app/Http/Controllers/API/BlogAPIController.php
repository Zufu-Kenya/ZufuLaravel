<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blogs;

class BlogAPIController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all();

        return response()->json($blogs, 200);
    }
}
