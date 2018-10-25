<?php

namespace Modules\Inventory\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use Translatable;

    protected $table = 'inventory__accounts';
    public $translatedAttributes = ['title'];
    protected $fillable = ['id','code','title','type','parent_id'];
    protected $fakeColumns = ['options'];
    //  protected $presenter = LandPresenter::class;
    protected static $entityNamespace = 'encorecms/accounts';

    /**
     * @return array
     */
    protected $casts = [
        'options' => 'array',
        'type' => 'integer',

    ];

    /**
     * @return mixed
     */
    public function users()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsToMany("Modules\\User\\Entities\\{$driver}\\User",'inventory_user_account')->withTimestamps();
    }
    /**
     * @param $value
     * @return mixed
     */
    public function getOptionsAttribute($value) {

        return json_decode(json_decode($value));

    }

    /**
     * Check if the post is in draft
     * @param Builder $query
     * @return Builder

     */
    public function scopeActive(Builder $query)
    {
        return $query->whereStatus(Status::ACTIVE);
    }
    /**
     * Check if the post is pending review
     * @param Builder $query
     * @return Builder
     */
    public function scopeInactive(Builder $query)
    {
        return $query->whereStatus(Status::INACTIVE);
    }
    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.inventory.config.account.relations', $method]);
        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);
            return $function($this);
        }
        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }
}
