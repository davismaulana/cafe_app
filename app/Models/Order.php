<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'total_price'];

    // Define the relationship to menus
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'order_menu')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
