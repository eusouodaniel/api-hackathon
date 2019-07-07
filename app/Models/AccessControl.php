<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as Audit;
use OwenIt\Auditing\Contracts\Auditable;

class AccessControl extends Model implements Auditable
{
    use Audit;

    protected $table = "access_control";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_login_at',
        'last_login_ip',
        'latitude',
        'longitude',
        'user_id',
    ];

    /**
     * Get the analyst.
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
