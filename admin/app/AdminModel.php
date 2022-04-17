<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    public $table        = 'admin_models';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public $timestamps   = false;
}
