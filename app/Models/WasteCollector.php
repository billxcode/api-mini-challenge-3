<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCollector extends Model
{
    protected $table = "waste_collector";
    public $timestamps = false;
    protected $fillable = ['address', 'available', 'photo', 'price_tag', 'collection_day', 'collection_time', 'lat', 'long', 'auth_id'];
}