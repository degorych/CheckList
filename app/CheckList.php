<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $table = 'check_lists';

    protected $fillable = [
        'name',
        'color',
        'description',
    ];
}
