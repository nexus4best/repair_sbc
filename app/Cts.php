<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cts extends Model
{
    protected $table = 'cts';
    protected $primaryKey = 'CtsId';

    protected $fillable = [
        'CtsName', 'CtsPhone',
    ];
}
