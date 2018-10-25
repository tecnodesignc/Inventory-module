<?php

namespace Modules\Inventory\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Translatable;

    protected $table = 'inventory__transactions';
    public $translatedAttributes = ['description'];
    protected $fillable = ['acount_id','description','land_id','value_type'];
}
