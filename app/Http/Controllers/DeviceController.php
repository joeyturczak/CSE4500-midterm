<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();

        return view('devices', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
            'spec_screen_size' => 'nullable',
            'spec_ram' => 'nullable',
            'spec_storage' => 'nullable',
        ]);

        $hardware = Device::create([
            'name' => $request->name,
            'manufacturer_id' => $request->manufacturer_id,
            'category_id' => $request->category_id,
            'spec_screen_size' => $request->spec_screen_size,
            'spec_ram' => $request->spec_ram,
            'spec_storage' => $request->spec_storage,
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
            'spec_screen_size' => 'nullable',
            'spec_ram' => 'nullable',
            'spec_storage' => 'nullable',
        ]);

        $device = Device::find($id);

        $device->name = $request->name;
        $device->manufacturer_id = $request->manufacturer_id;
        $device->category_id = $request->category_id;
        $device->spec_screen_size = $request->spec_screen_size;
        $device->spec_ram = $request->spec_ram;
        $device->spec_storage = $request->spec_storage;

        $device->update();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        
        $device->delete();

        return $this->index();
    }
}
