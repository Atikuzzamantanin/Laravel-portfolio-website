<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoTableModel extends Model
{
    public $table        = 'photo_table_models';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public $timestamps   = false;
}
