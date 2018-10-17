<?php

namespace Modules\Inventary\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Acount extends Model
{
    use Translatable;

    protected $table = 'inventary__acounts';
    public $translatedAttributes = [];
    protected $fillable = [];
}
