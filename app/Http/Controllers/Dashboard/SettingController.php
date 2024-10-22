<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $this->authorize('view', $setting);
        return view('dashboard.settings');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Setting $setting)
    {
        $data = [
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ];

        foreach (config('app.languages') as $key => $value) {
            $data[$key.'*.title'] = 'nullable|string';
            $data[$key.'*.content'] = 'nullable|string';
            $data[$key.'*.address'] = 'nullable|string';
        }
        $validatedData = $request->validate($data);

        $setting->update($request->except('logo', 'favicon', '_token'));

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = Str::uuid().$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/'.$filename;
            $setting->update(['logo'=>$path]);
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $filename = Str::uuid().$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/'.$filename;
            $setting->update(['favicon'=>$path]);
        }



        return redirect()->route('dashboard.settings');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
