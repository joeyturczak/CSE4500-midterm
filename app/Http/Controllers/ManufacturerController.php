<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        return view('manufacturers', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturers.create');
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
            'sales_phone' => 'required',
            'sales_email' => 'required',
            'support_phone' => 'required',
            'support_email' => 'required',
        ]);

        $manufacturer = Manufacturer::create([
            'name' => $request->name,
            'sales_phone' => $request->sales_phone,
            'sales_email' => $request->sales_email,
            'support_phone' => $request->support_phone,
            'support_email' => $request->support_email,
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
        $manufacturer = Manufacturer::find($id);
        return view('manufacturers.show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::find($id);
        return view('manufacturers.edit', compact('manufacturer'));
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
            'sales_phone' => 'required',
            'sales_email' => 'required',
            'support_phone' => 'required',
            'support_email' => 'required',
        ]);

        $manufacturer = Manufacturer::find($id);
        $manufacturer->name = $request->name;
        $manufacturer->sales_phone = $request->sales_phone;
        $manufacturer->sales_email = $request->sales_email;
        $manufacturer->support_phone = $request->support_phone;
        $manufacturer->support_email = $request->support_email;

        $manufacturer->save();

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
        Manufacturer::destroy($id);
    }
}
