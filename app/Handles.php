<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handles extends Model
{
    protected $table='handles';
    protected $fillable=['pharma_email','cust_email'];
    //protected $primaryKey=['pharma_email','cust_email'];
    protected $primaryKey='id';
}
