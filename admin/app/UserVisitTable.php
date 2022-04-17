<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVisitTable extends Model
{
    public $table        = 'user_visit_tables';
    public $primaryKey   = 'id';
    public $incrementing = true;
    public $keyType      = 'int';
    public $timestamps   = false;

}
