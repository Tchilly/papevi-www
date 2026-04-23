<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function __construct(private BlogService $blog) {}

    public function index(): Response
    {
        return Inertia::render('Blog/Index', [
            'posts' => $this->blog->all(),
        ]);
    }

    public function show(string $slug): Response
    {
        $post = $this->blog->find($slug);

        abort_if($post === null, 404);

        return Inertia::render('Blog/Show', [
            'post' => $post,
        ]);
    }
}
