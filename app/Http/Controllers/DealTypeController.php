<?php

namespace App\Http\Controllers;

use App\DataTables\DealTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDealTypeRequest;
use App\Http\Requests\UpdateDealTypeRequest;
use App\Repositories\DealTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DealTypeController extends AppBaseController
{
    /** @var  DealTypeRepository */
    private $dealTypeRepository;

    public function __construct(DealTypeRepository $dealTypeRepo)
    {
        $this->dealTypeRepository = $dealTypeRepo;
    }

    /**
     * Display a listing of the DealType.
     *
     * @param DealTypeDataTable $dealTypeDataTable
     * @return Response
     */
    public function index(DealTypeDataTable $dealTypeDataTable)
    {
        return $dealTypeDataTable->render('deal_types.index');
    }

    /**
     * Show the form for creating a new DealType.
     *
     * @return Response
     */
    public function create()
    {
        return view('deal_types.create');
    }

    /**
     * Store a newly created DealType in storage.
     *
     * @param CreateDealTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDealTypeRequest $request)
    {
        $input = $request->all();

        $dealType = $this->dealTypeRepository->create($input);

        Flash::success('Deal Type saved successfully.');

        return redirect(route('dealTypes.index'));
    }

    /**
     * Display the specified DealType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dealType = $this->dealTypeRepository->findWithoutFail($id);

        if (empty($dealType)) {
            Flash::error('Deal Type not found');

            return redirect(route('dealTypes.index'));
        }

        return view('deal_types.show')->with('dealType', $dealType);
    }

    /**
     * Show the form for editing the specified DealType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dealType = $this->dealTypeRepository->findWithoutFail($id);

        if (empty($dealType)) {
            Flash::error('Deal Type not found');

            return redirect(route('dealTypes.index'));
        }

        return view('deal_types.edit')->with('dealType', $dealType);
    }

    /**
     * Update the specified DealType in storage.
     *
     * @param  int              $id
     * @param UpdateDealTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDealTypeRequest $request)
    {
        $dealType = $this->dealTypeRepository->findWithoutFail($id);

        if (empty($dealType)) {
            Flash::error('Deal Type not found');

            return redirect(route('dealTypes.index'));
        }

        $dealType = $this->dealTypeRepository->update($request->all(), $id);

        Flash::success('Deal Type updated successfully.');

        return redirect(route('dealTypes.index'));
    }

    /**
     * Remove the specified DealType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dealType = $this->dealTypeRepository->findWithoutFail($id);

        if (empty($dealType)) {
            Flash::error('Deal Type not found');

            return redirect(route('dealTypes.index'));
        }

        $this->dealTypeRepository->delete($id);

        Flash::success('Deal Type deleted successfully.');

        return redirect(route('dealTypes.index'));
    }
}
