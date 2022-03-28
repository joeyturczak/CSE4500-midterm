<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deviceuser;
use App\Models\Device;
use App\Models\Note;

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

    public function deviceuser()
    {
        return $this->belongsTo(Deviceuser::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
