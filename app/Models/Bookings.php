<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'car_id',
        'is_cancelled'
    ];

    public function user()
    {
        return $this->belongsTo('App\Users', 'id', 'user_id');
    }

    public function car()
    {
        return $this->belongsTo('App\Supplier\Cars', 'id', 'car_id');
    }
}
