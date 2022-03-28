<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturer;
use App\Models\Category;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'spec_screen_size',
        'spec_ram',
        'spec_storage',
        'manufacturer_id',
        'category_id'
    ];

    public function manufacturers()
    {
        return Manufacturer::all();
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
