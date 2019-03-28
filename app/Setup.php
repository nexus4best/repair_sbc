<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    protected $table = 'setup';
    protected $primaryKey = 'SetupId';

    protected $fillable = [
        'SetupName', 'SetupPhone',
    ];
}
