<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseHold extends Model
{
    protected $table = "house_hold";
    protected $fillable = ['auth_id', 'address', 'lat', 'long', 'photo'];
    public $timestamps = false;
}