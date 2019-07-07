<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as Audit;
use Cviebrock\EloquentSluggable\Sluggable;

class Vacancy extends Model implements Auditable
{
    use Audit, Sluggable;
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'cpf',
        'address_of_residence',
        'garage_address',
        'job_identification',
        'rent_value',
        'description',
        'size_of_the_vacancy',
        'property_type',
        'has_concierge',
        'has_alarm',
        'double_vacancy',
        'photo',
        'latitude',
        'longitude',
        'status',
        'slug',
        'user_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
     public function sluggable()
     {
         return [
             'slug' => [
                 'source' => 'garage_address'
             ]
         ];
     }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}