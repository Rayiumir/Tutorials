<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\CreateServiceRequest;
use App\Http\Requests\Admin\Services\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(5);
        return view('admin.services.index', compact('services'));
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
    public function store(CreateServiceRequest $request)
    {
        $data = $request->validated();
        Service::create($data);

        $notification = [
            'message' => 'خدمت با موفقیت ایجاد شد',
            'alert-type' => 'success'
        ];

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $services = Service::paginate(5);
        return view('admin.services.edit', compact('service', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        $service->update($data);

        $notification = [
            'message' => 'خدمت با موفقیت ویرایش شد',
            'alert-type' => 'success'
        ];

        return to_route('services.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $notification = [
            'message' => 'خدمت با موفقیت حذف شد',
            'alert-type' => 'success'
        ];

        return back()->with($notification);
    }
}
