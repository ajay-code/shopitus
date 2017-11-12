<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductCategoryRepository
 * @package App\Repositories
 * @version November 12, 2017, 10:44 am UTC
 *
 * @method ProductCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductCategory find($id, $columns = ['*'])
 * @method ProductCategory first($columns = ['*'])
*/
class ProductCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductCategory::class;
    }
}
