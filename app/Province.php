<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'PrvCode';

    protected $fillable = [
        'PrvName ',
    ];
}
