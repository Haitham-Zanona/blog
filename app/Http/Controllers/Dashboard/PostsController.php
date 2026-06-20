<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
    use UploadImage;

    protected Post $postmodel;

    public function __construct(Post $post)
    {
        $this->postmodel = $post;
    }

    public function index()
    {
        return view('dashboard.posts.index');
    }

    public function create()
    {
        $categories = Category::with('translations')->get();
        if ($categories->isEmpty()) {
            abort(404);
        }
        return view('dashboard.posts.add', compact('categories'));
    }

    public function getPostsDatatable()
    {
        $data = Post::select('*')->with(['translations', 'category.translations']);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function (Post $row) {
                if (Gate::allows('update', $row)) {
                    return '<a href="' . route('dashboard.posts.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
            })
            ->addColumn('category_name', function (Post $row) {
                if (!$row->category) return '—';
                $translation = $row->category->translate(app()->getLocale());
                return $translation ? $translation->title : '—';
            })
            ->addColumn('title', function (Post $row) {
                $translation = $row->translate(app()->getLocale());
                return $translation ? $translation->title : '—';
            })
            ->rawColumns(['action', 'title', 'category_name'])
            ->make(true);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', $this->postmodel);
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);
        $post = Post::create($request->except('image', '_token'));
        $post->update(['user_id' => auth()->id()]);
        if ($request->hasFile('image')) {
            $post->update(['image' => $this->upload($request->file('image'))]);
        }
        Cache::forget('last_five_posts');
        return redirect()->route('dashboard.posts.index');
    }

    public function show(Post $post): void
    {
        //
    }

    public function edit(Post $post): \Illuminate\View\View
    {
        $this->authorize('update', $post);
        $categories = Category::with('translations')->get();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);
        $post->update($request->except('image', '_token'));
        $post->update(['user_id' => auth()->id()]);
        if ($request->hasFile('image')) {
            $post->update(['image' => $this->upload($request->file('image'))]);
        }
        Cache::forget('last_five_posts');
        return redirect()->route('dashboard.posts.edit', $post);
    }

    public function destroy(Post $post): void
    {
        //
    }

    public function delete(Request $request): RedirectResponse
    {
        $post = $this->postmodel->find($request->id);
        $this->authorize('delete', $post);
        if (is_numeric($request->id)) {
            Post::where('id', $request->id)->delete();
        }
        Cache::forget('last_five_posts');
        return redirect()->route('dashboard.posts.index');
    }
}
