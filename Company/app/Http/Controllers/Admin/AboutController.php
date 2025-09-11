<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\CreateAboutRequest;
use App\Http\Requests\Admin\About\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAboutRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('about/images', $imageName, 'public_files');
        }

        $data['image'] = $imageName;

        About::create($data);

        $notification = [
            'message' => 'درباره ما با موفقیت ایجاد شد.',
            'alert-type' => 'success'
        ];

        return to_route('about.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('about/images', $imageName, 'public_files');
        }

        $data['image'] = $imageName;

        $about->update($data);

        $notification = [
            'message' => 'درباره ما با موفقیت ویرایش شد.',
            'alert-type' => 'success'
        ];

        return to_route('about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        $notification = [
            'message' => 'درباره ما با موفقیت حذف شد.',
            'alert-type' => 'success'
        ];

        return to_route('about.index')->with($notification);
    }
}
