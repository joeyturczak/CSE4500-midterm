<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sales_phone',
        'sales_email',
        'support_phone',
        'support_email'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
