<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $setting;
    public function __construct(Setting $setting) {
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
        $categories = Category::whereNull('parent')->orWhere('parent',0)->get();
        return view('dashboard.categories.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create($request->except('image', '_token'));

        return view('dashboard.categories.index');
    }

    public function getCategoriesDatatable()
    {



        $data = Category::select('*')->with('parents');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                if (auth()->user()->can('viewAny', $this->setting)) {
                    return $btn = '
                        <a href="' . Route('dashboard.category.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }

            })
            ->addColumn('parent', function ($row) {
                return ($row->parent ==  0) ? trans('words.main category') :   $row->parents->translate(app()->getLocale())->title;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
