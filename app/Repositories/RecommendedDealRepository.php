<?php

namespace App\Repositories;

use App\Models\RecommendedDeal;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RecommendedDealRepository
 * @package App\Repositories
 * @version November 15, 2017, 5:19 pm UTC
 *
 * @method RecommendedDeal findWithoutFail($id, $columns = ['*'])
 * @method RecommendedDeal find($id, $columns = ['*'])
 * @method RecommendedDeal first($columns = ['*'])
*/
class RecommendedDealRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RecommendedDeal::class;
    }
}
