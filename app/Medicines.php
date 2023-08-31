<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    protected $table='medicines';
    protected $fillable=['medicine_number','medicine_name','manufacture_date','expiring_date','price'];
    protected $primaryKey='medicine_number';
    public $incrementing = false;
}
