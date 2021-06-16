<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['Product_name','description','section_id'];
    protected $hidden = [''];


    public function section()
    { // One To Many
        return $this->belongsTo('App\sections');
    }
}
