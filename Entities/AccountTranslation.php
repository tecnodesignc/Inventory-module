<?php

namespace Modules\Inventary\Entities;

use Illuminate\Database\Eloquent\Model;

class AccountTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'inventary__account_translations';
}
