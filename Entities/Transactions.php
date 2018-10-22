<?php

namespace Modules\Inventory\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Translatable;

    protected $table = 'inventory__transactions';
    public $translatedAttributes = [];
    protected $fillable = [];
}
