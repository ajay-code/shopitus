<?php

namespace App\Http\Controllers;

use App\DataTables\RecommendedDealDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRecommendedDealRequest;
use App\Http\Requests\UpdateRecommendedDealRequest;
use App\Repositories\RecommendedDealRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RecommendedDealController extends AppBaseController
{
    /** @var  RecommendedDealRepository */
    private $recommendedDealRepository;

    public function __construct(RecommendedDealRepository $recommendedDealRepo)
    {
        $this->recommendedDealRepository = $recommendedDealRepo;
    }

    /**
     * Display a listing of the RecommendedDeal.
     *
     * @param RecommendedDealDataTable $recommendedDealDataTable
     * @return Response
     */
    public function index(RecommendedDealDataTable $recommendedDealDataTable)
    {
        return $recommendedDealDataTable->render('recommended_deals.index');
    }

    /**
     * Show the form for creating a new RecommendedDeal.
     *
     * @return Response
     */
    public function create()
    {
        return view('recommended_deals.create');
    }

    /**
     * Store a newly created RecommendedDeal in storage.
     *
     * @param CreateRecommendedDealRequest $request
     *
     * @return Response
     */
    public function store(CreateRecommendedDealRequest $request)
    {
        $input = $request->all();
        if($request->hasFile('image')){
            $request->image->store('images');
            $name = $request->image->hashName();
            $input['image'] = 'images/' . $name;
        }

        $recommendedDeal = $this->recommendedDealRepository->create($input);

        Flash::success('Recommended Deal saved successfully.');

        return redirect(route('recommendedDeals.index'));
    }

    /**
     * Display the specified RecommendedDeal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recommendedDeal = $this->recommendedDealRepository->findWithoutFail($id);

        if (empty($recommendedDeal)) {
            Flash::error('Recommended Deal not found');

            return redirect(route('recommendedDeals.index'));
        }

        return view('recommended_deals.show')->with('recommendedDeal', $recommendedDeal);
    }

    /**
     * Show the form for editing the specified RecommendedDeal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recommendedDeal = $this->recommendedDealRepository->findWithoutFail($id);

        if (empty($recommendedDeal)) {
            Flash::error('Recommended Deal not found');

            return redirect(route('recommendedDeals.index'));
        }

        return view('recommended_deals.edit')->with('recommendedDeal', $recommendedDeal);
    }

    /**
     * Update the specified RecommendedDeal in storage.
     *
     * @param  int              $id
     * @param UpdateRecommendedDealRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecommendedDealRequest $request)
    {
        $recommendedDeal = $this->recommendedDealRepository->findWithoutFail($id);

        if (empty($recommendedDeal)) {
            Flash::error('Recommended Deal not found');

            return redirect(route('recommendedDeals.index'));
        }
        $input = $request->all();
        if($request->hasFile('image')){
            $request->image->store('images');
            $name = $request->image->hashName();
            $input['image'] = 'images/' . $name;
        }

        $recommendedDeal = $this->recommendedDealRepository->update($input, $id);

        Flash::success('Recommended Deal updated successfully.');

        return redirect(route('recommendedDeals.index'));
    }

    /**
     * Remove the specified RecommendedDeal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recommendedDeal = $this->recommendedDealRepository->findWithoutFail($id);

        if (empty($recommendedDeal)) {
            Flash::error('Recommended Deal not found');

            return redirect(route('recommendedDeals.index'));
        }

        $this->recommendedDealRepository->delete($id);

        Flash::success('Recommended Deal deleted successfully.');

        return redirect(route('recommendedDeals.index'));
    }
}
