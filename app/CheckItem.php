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
        'order',
        'is_done',
    ];

    public function checkLists()
    {
        return $this->belongsTo('App\CheckList');
    }
}
