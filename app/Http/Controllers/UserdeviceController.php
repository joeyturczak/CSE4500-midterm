<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdevice;
use App\Models\Device;
use App\Models\Deviceuser;
use App\Models\Manufacturer;
use App\Models\Category;

class UserdeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($view_type = 'all', $id = null)
    {
        // $userdevices = Userdevice::all();

        $devices = Device::all();
        $deviceusers = Deviceuser::all();
        $manufacturers = Manufacturer::all();
        $categories = Category::all();

        $userdevices = Userdevice::all();

        if($id == null)
        {
            switch($view_type)
            {
                case 'user':
                    $userdevices = Userdevice::where('id', $id)->get();
                    break;
                case 'category':
                    $userdevices = Userdevice::whereHas('device_id', function($d) {
                        $d->where('category_id', $id);
                    });
                    break;
                case 'manufacturer':
                    $userdevices = Userdevice::whereHas('device_id', function($d) {
                        $d->where('manufacturer_id', $id);
                    });
                    break;
                default:
                    break;
            }
        }
        

        return view('userdevices', compact('userdevices', 'devices', 'deviceusers', 'manufacturers', 'view_type', 'id'));
    }

    public function userlist()
    {
        $deviceusers = Deviceuser::all();

        return view('userdevices.userlist', compact('deviceusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        $deviceusers = Deviceuser::all();

        return view('userdevices.create', compact('devices', 'deviceusers'));
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
            'device_id' => 'required',
            'deviceuser_id' => 'nullable',
            'invoice_number' => 'required',
            'price' => 'required',
            'purchase_date' => 'required',
        ]);

        $format = "Y-m-d";

        $userdevices = Userdevice::create([
            'device_id' => $request->device_id,
            'deviceuser_id' => $request->deviceuser_id,
            'invoice_number' => $request->invoice_number,
            'price' => $request->price,
            'purchase_date' => date($format, strtotime($request->purchase_date)),
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
        $userdevice = Userdevice::find($id);
        return view('userdevices.show', compact('userdevice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $devices = Device::all();
        $deviceusers = Deviceuser::all();

        $userdevice = Userdevice::find($id);
        return view('userdevices.edit', compact('userdevice', 'devices', 'deviceusers'));
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
            'device_id' => 'required',
            'deviceuser_id' => 'nullable',
            'invoice_number' => 'required',
            'price' => 'required',
            'purchase_date' => 'required',
        ]);

        $format = "Y-m-d";

        $userdevice = Userdevice::find($id);

        $userdevice->device_id = $request->device_id;
        $userdevice->deviceuser_id = $request->deviceuser_id;
        $userdevice->invoice_number = $request->invoice_number;
        $userdevice->price = $request->price;
        $userdevice->purchase_date = date($format, strtotime($request->purchase_date));

        $userdevice->update();

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
        $userdevice = Userdevice::find($id);
        
        $userdevice->delete();

        return $this->index();
    }
}
