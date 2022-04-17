<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServisModel extends Model
{
    public $table        = 'servis_models';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public $timestamps   = false;
}
