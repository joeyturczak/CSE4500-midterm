<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Userdevice;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'description',
        'userdevice_id',
    ];

    public function userdevice()
    {
        return $this->belongsTo(Userdevice::class);
    }
}
