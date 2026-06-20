<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    use UploadImage;

    public function index()
    {
        $setting = Setting::first();
        $this->authorize('view', $setting);
        return view('dashboard.settings');
    }

    public function update(Request $request, Setting $setting)
    {
        $rules = [
            'logo'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:2048'],
            'favicon'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:2048'],
            'facebook'  => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'phone'     => ['nullable', 'string'],
            'email'     => ['nullable', 'email:rfc'],
        ];

        foreach (array_keys(config('app.languages')) as $key) {
            $rules["{$key}.title"]   = ['nullable', 'string'];
            $rules["{$key}.content"] = ['nullable', 'string'];
            $rules["{$key}.address"] = ['nullable', 'string'];
        }

        $request->validate($rules);

        $setting->update($request->except('logo', 'favicon', '_token'));

        if ($request->hasFile('logo')) {
            $setting->update(['logo' => $this->upload($request->file('logo'))]);
        }

        if ($request->hasFile('favicon')) {
            $setting->update(['favicon' => $this->upload($request->file('favicon'))]);
        }

        Cache::forget('site_settings');

        return redirect()->route('dashboard.settings');
    }
}
