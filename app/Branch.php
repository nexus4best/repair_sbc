<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $primaryKey = 'BrnCode';

    protected $fillable = [
        'BrnName', 'BrnOpen', 'BrnTel', 'BrnFax', 'BrnShowQuoDesc', 'BrnPrv'
    ];
}
