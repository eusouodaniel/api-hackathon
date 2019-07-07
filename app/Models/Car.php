<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Audit;

class Car extends Model implements Auditable
{
    use Audit;
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'color', 'year_of_manufacture', 'board', 'status', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}