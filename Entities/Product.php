<?php

namespace Modules\Inventary\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Traits\NamespacedEntity;
use Laracasts\Presenter\PresentableTrait;

class Product extends Model
{
    use Translatable,PresentableTrait, NamespacedEntity;


    protected $table = 'inventary__products';
    public $translatedAttributes = ['title','description','summary'];
    protected $fillable = ['title','description','summary','status','user_id','category_id','sku','quantity','stock','manufacturer_id','price','weight','lenght','width','height'];
    protected $fakeColumns = ['options'];

    protected $casts = [
        'options' => 'array',
        'status' => 'int',
    ];

    public function users()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsToMany("Modules\\User\\Entities\\{$driver}\\User",'inventary__user_product')->withTimestamps();
    }

    public function getOptionsAttribute($value) {

        return json_decode(json_decode($value));

    }
    public function getThumbnailAttribute()
    {
        $thumbnail = $this->files()->where('thumbnail')->first();
        if ($thumbnail === null) {
            return '';
        }
        return $thumbnail;
    }
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
















}

