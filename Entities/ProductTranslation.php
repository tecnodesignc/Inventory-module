<?php

namespace Modules\Inventary\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'inventary__product_translations';
}
