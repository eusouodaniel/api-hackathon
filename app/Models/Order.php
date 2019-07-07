<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Audit;

class Order extends Model implements Auditable
{
    use Audit;
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vacancy_id',
        'user_id'
    ];

    public function vacancy(){
        return $this->belongsTo("App\Models\Vacancy");
    }
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}