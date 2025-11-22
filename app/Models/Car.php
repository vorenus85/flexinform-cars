<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type',
        'registered',
        'ownbrand', 
        'accident',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

}
