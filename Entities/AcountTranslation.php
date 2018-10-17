<?php

namespace Modules\Inventary\Entities;

use Illuminate\Database\Eloquent\Model;

class AcountTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'inventary__acount_translations';
}
