<?php

namespace Modules\Inventary\Entities;

use Illuminate\Database\Eloquent\Model;

class TransationTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'inventary__transation_translations';
}
