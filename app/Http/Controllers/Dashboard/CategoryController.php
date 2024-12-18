<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    use UploadImage;

    protected $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('viewAny', $this->setting);
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        return view('dashboard.categories.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('viewAny', $this->setting);
        $category = Category::create($request->except('_token'));

        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $filename = Str::uuid() . $file->getClientOriginalName();
        //     $file->move(public_path('images'), $filename);
        //     $path = 'images/' . $filename;
        //     $category->update(['image' => $path]);
        // }
        // $category->update(['user_id' => auth()->user()->id]);
        // dd($category);

        if ($request->hasFile('image')) {
            // dd($category);

            $category->update(['image' => $this->upload($request->image)]);
            dd($category);

        }

        foreach (config('app.languages') as $key => $lang) {
            $slug = $request->$key['title'];
            CategoryTranslation::where('category_id', $category->id)->where('locale', $key)->update([
                'slug' => Str::slug($slug),
            ]);
        }

        return redirect()->route('dashboard.category.index');
    }

    public function getCategoriesDatatable()
    {
        $data = Category::select('*')->with('parents');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                if (auth()->user()->can('viewAny', $this->setting)) {
                    return $btn = '
                        <a href="' . route('dashboard.category.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }

            })
            ->addColumn('parent', function ($row) {
                return ($row->parent == 0) ? trans('words.main category') : $row->parents->translate(app()->getLocale())->title;
            })
            ->addColumn('title', function ($row) {
                // return $row->translate(app()->getLocale())->title();
                return $row->translate(app()->getLocale())->getAttribute('title');
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? trans('words.not activated') : trans('words.' . $row->status);
            })
            ->rawColumns(['action', 'status', 'title'])
            ->make(true);

        // return datatables()->of($category)->toJson();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('viewAny', $this->setting);
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();

        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('viewAny', $this->setting);
        // Validate the incoming request data
        // $request->validate([
        //     // Add your validation rules here
        //     'title' => 'required|string|max:255', // Example rule
        //     // 'content' => 'required|string|max:1024',
        //     // 'slug' => 'required|string|max:255',
        //     // 'parent' => 'required|string|max:255',
        //     // Add other fields as necessary
        // ]);

        $category->update($request->except('image', '__token'));

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $category->update(['image' => $path]);

        }
        // dd($category);

        foreach (config('app.languages') as $key => $lang) {
            $slug = $request->$key['title'];
            CategoryTranslation::where('category_id', $category->id)->where('locale', $key)->update([
                'slug' => $this->createSlug($slug),

            ]);
        }

        return redirect()->route('dashboard.category.index')->with('success', 'Category updated successfully.');

    }

    public function createSlug($text)
    {
        return str_replace(' ', '-', $text);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
        return redirect()->route('dashboard.category.index');
    }
}