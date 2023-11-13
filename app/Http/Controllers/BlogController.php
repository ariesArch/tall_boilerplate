<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    // public function index() 
    // {
    //     return view('blogs.index');
    // }
    public function index()
    {
        // abort_if(Gate::denies('list_blog'), 403);
        // abort_if(Gate::denies('access-blog'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->checkWebGate('access-blog');
        return view('blogs.index');
    }
}
