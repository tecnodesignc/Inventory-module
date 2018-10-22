<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class AccountTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'inventory__account_translations';
}
