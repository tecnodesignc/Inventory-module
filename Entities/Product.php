<?php

namespace Modules\Inventary\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $table = 'inventary__products';
    public $translatedAttributes = [];
    protected $fillable = [];
}
