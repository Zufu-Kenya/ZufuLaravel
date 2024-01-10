<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequests\StoreBlogsRequest;
use App\Http\Requests\BlogRequests\UpdateBlogsRequest;
use App\Models\Blogs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-blog|edit-blog|delete-blog', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-blog', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('blogs.index', [
            'blogs' => Blogs::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $data['image'] = $imagePath;
        }

        Blogs::create($data);

        return redirect()->route('blogs.index')->withSuccess('Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blog): View
    {
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog): View
    {
        return view('blogs.edit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blogs): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($blogs->image) {
                Storage::disk('public')->delete($blogs->image);
            }

            $imagePath = $request->file('image')->store('blog_images', 'public');
            $data['image'] = $imagePath;
        }

        $blogs->update($data);

        return redirect()->back()->withSuccess('Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs): RedirectResponse
    {
        $blogs->delete();

        return redirect()->route('blogs.index')->withSuccess('Blog deleted successfully');
    }
}
