<?php

namespace App\Repositories;

use App\Models\DealType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DealTypeRepository
 * @package App\Repositories
 * @version November 12, 2017, 11:23 am UTC
 *
 * @method DealType findWithoutFail($id, $columns = ['*'])
 * @method DealType find($id, $columns = ['*'])
 * @method DealType first($columns = ['*'])
*/
class DealTypeRepository extends BaseRepository
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
        return DealType::class;
    }
}
