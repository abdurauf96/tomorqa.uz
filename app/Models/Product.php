<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'segment_short', 'segment_full'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function stored_products()
    {
        return $this->hasMany(StoredProduct::class);
    }

    public function planted_products()
    {
        return $this->hasMany(PlantedProduct::class);
    }

    public function expected_products()
    {
        return $this->hasMany(ExpectedProduct::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($product) {
             $product->stored_products()->delete();
             $product->planted_products()->delete();
             $product->expected_products()->delete();
        }); 
    }

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
