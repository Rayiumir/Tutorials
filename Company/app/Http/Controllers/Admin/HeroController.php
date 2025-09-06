<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hero\HeroCreateRequest;
use App\Http\Requests\Admin\Hero\HeroUpdateRequest;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeroCreateRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('hero/images', $imageName, 'public_files');
        }

        $data['image'] = $imageName;

        Hero::create($data);

        $notification = [
            'message' => 'صفحه معرفی با موفقیت ایجاد شد.',
            'alert-type' => 'success'
        ];

        return to_route('heroes.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeroUpdateRequest $request, Hero $hero)
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('hero/images', $imageName, 'public_files');
        }

        $data['image'] = $imageName;

        $hero->update($data);

        $notification = [
            'message' => 'صفحه معrefی با موفقیت ویرایش شد.',
            'alert-type' => 'success'
        ];

        return to_route('heroes.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        $hero->delete();
        $notification = [
            'message' => 'صفحه معرفی با موفقیت حذف شد.',
            'alert-type' => 'success'
        ];
        return to_route('heroes.index')->with($notification);
    }
}
