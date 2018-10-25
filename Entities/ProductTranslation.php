<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description','summary'];
    protected $table = 'inventory__product_translations';
}













