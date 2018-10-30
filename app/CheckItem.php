<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckItem extends Model
{
    protected $table = 'check_items';

    protected $fillable = [
        'check_list_id',
        'title',
        'description',
        'is_done',
        'order',
    ];
}
