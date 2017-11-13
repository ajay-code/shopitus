<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Models
 * @version November 12, 2017, 3:11 pm UTC
 *
 * @property string name
 * @property integer product_category_id
 * @property integer deal_type_id
 * @property integer store_id
 * @property string image
 * @property string link
 * @property string text
 */
class Product extends Model
{

    public $table = 'products';
    


    public $fillable = [
        'name',
        'product_category_id',
        'deal_type_id',
        'store_id',
        'image',
        'link',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'product_category_id' => 'integer',
        'deal_type_id' => 'integer',
        'store_id' => 'integer',
        'image' => 'string',
        'link' => 'string',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'product_category_id' => 'required',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        'link' => 'required',
        'text' => 'required'
    ];


    /* 
        Relations
    */

    public function product_category()
    {
      return $this->belongsTo(ProductCategory::class);
    }

    public function deal_type()
    {
      return $this->belongsTo(DealType::class);
    }

    public function store()
    {
      return $this->belongsTo(Store::class);
    }

    
}
