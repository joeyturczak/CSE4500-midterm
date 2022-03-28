<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Userdevice;
use App\Models\Device;

class Userdevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'price',
        'purchase_date',
        'deviceuser_id',
        'device_id',
    ];

    public function user()
    {
        return $this->belongsTo(Deviceuser::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
