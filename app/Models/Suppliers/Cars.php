<?php 

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'supplier_cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'make',
      'model',
      'year',
      'seats',
      'class',
      'price_per_day',
      'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Suppliers\Suppliers', 'id', 'supplier_id');
    }

    public function bookings()
    {
        return $this->belongsToMany('App\Models\Bookings', 'car_id', 'id');
    }
}
