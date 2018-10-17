<?php

namespace Modules\Inventary\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
    use Translatable;

    protected $table = 'inventary__transations';
    public $translatedAttributes = [];
    protected $fillable = [];
}
