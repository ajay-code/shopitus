<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class RecommendedDeal
 * @package App\Models
 * @version November 15, 2017, 5:19 pm UTC
 *
 * @property string name
 * @property string image
 * @property string link
 */
class RecommendedDeal extends Model
{

    public $table = 'recommended_deals';
    


    public $fillable = [
        'name',
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
        'image' => 'required|mimes:jpeg,jpg,png,gif',
        'link' => 'required',
        'text' => 'required|max:191'
    ];

    
}
