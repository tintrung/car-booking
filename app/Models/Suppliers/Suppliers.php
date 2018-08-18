<?php 

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code'
    ];

    public function cars()
    {
        return $this->hasMany('App\Models\Suppliers\Cars', 'supplier_id', 'id');
    }
}
