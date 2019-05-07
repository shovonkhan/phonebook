<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_pages extends Model
{
    protected $table = 'tbl_pages';
 
    public function parent()
    {
        return $this->belongsTo('App\tbl_pages', 'parent_id');
    }
 
    public function children()
    {
        return $this->hasMany('App\tbl_pages', 'parent_id');
    }
}
