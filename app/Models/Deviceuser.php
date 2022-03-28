<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Userdevice;

class Deviceuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function userdevice()
    {
        return $this->hasMany(Userdevice::class);
    }
}
