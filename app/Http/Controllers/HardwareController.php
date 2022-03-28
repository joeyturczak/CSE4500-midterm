<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardwares = Hardware::all();

        return view('hardwares', compact('hardwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hardwares.create');
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
            'spec_screen_size' => 'nullable',
            'spec_ram' => 'nullable',
            'spec_storage' => 'nullable',
        ]);

        $hardware = Hardware::create([
            'name' => $request->name,
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
        $hardware = Hardware::find($id);
        return view('hardwares.show', compact('hardware'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hardware = Hardware::find($id);
        return view('hardwares.edit', compact('hardware'));
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
            'spec_screen_size' => 'nullable',
            'spec_ram' => 'nullable',
            'spec_storage' => 'nullable',
        ]);

        $hardware = Hardware::find($id);

        $hardware->name = $request->name;
        $hardware->spec_screen_size = $request->spec_screen_size;
        $hardware->spec_ram = $request->spec_ram;
        $hardware->spec_storage = $request->spec_storage;

        $hardware->update();

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
        $hardware = Hardware::find($id);
        
        $hardware->delete();

        return $this->index();
    }
}
