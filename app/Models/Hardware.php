<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturer;

class Hardware extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'spec_screen_size',
        'spec_ram',
        'spec_storage',
    ];

    public function manufacturers()
    {
        return Manufacturers::class.all();
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
