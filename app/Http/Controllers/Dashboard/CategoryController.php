<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    use UploadImage;

    protected Setting $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function create()
    {
        $this->authorize('viewAny', $this->setting);
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        return view('dashboard.categories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('viewAny', $this->setting);
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $category = Category::create($request->except('_token'));

        if ($request->hasFile('image')) {
            $category->update(['image' => $this->upload($request->file('image'))]);
        }

        foreach (array_keys(config('app.languages')) as $key) {
            $slug = $request->input("{$key}.title", '');
            CategoryTranslation::where('category_id', $category->id)->where('locale', $key)->update([
                'slug' => Str::slug($slug),
            ]);
        }

        Cache::forget('nav_categories');

        return redirect()->route('dashboard.category.index');
    }

    public function getCategoriesDatatable()
    {
        $data = Category::select('*')->with(['translations', 'parents.translations']);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if (Gate::allows('viewAny', $this->setting)) {
                    return '<a href="' . route('dashboard.category.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
            })
            ->addColumn('parent', function ($row) {
                if ($row->parent == 0 || $row->parents === null) {
                    return trans('words.main category');
                }
                $translation = $row->parents->translate(app()->getLocale());
                return $translation ? $translation->title : '—';
            })
            ->addColumn('title', function ($row) {
                $translation = $row->translate(app()->getLocale());
                return $translation ? $translation->getAttribute('title') : '—';
            })
            ->addColumn('status', function ($row) {
                return $row->status === null ? trans('words.not activated') : trans('words.' . $row->status);
            })
            ->rawColumns(['action', 'status', 'title'])
            ->make(true);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $this->authorize('viewAny', $this->setting);
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();

        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('viewAny', $this->setting);
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $category->update($request->except('image', '_token'));

        if ($request->hasFile('image')) {
            $category->update(['image' => $this->upload($request->file('image'))]);
        }

        foreach (array_keys(config('app.languages')) as $key) {
            $slug = $request->input("{$key}.title", '');
            CategoryTranslation::where('category_id', $category->id)->where('locale', $key)->update([
                'slug' => Str::slug($slug),
            ]);
        }

        Cache::forget('nav_categories');

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        //
    }

    public function delete(Request $request)
    {
        $this->authorize('viewAny', $this->setting);
        if (is_numeric($request->id)) {
            Category::where('parent', $request->id)->delete();
            Category::where('id', $request->id)->delete();
        }

        Cache::forget('nav_categories');

        return redirect()->route('dashboard.category.index');
    }
}
