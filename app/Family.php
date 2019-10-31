<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public $timestamps = false;
    protected $fillable=["id","first_name","middlen_name","last_name","gender","relationship","family_member"];
    protected $table="family";
}
