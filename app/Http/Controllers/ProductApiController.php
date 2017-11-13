<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        // url : api/products?store=1&deal_type=1&product_category=1&page=1
        $products = Product::with('store');
        if($request->product_category){
            $products = $products->where('product_category_id', $request->product_category);
        }
        if($request->deal_type){
            $products = $products->where('deal_type_id', $request->deal_type);
        }
        if($request->store){
            $products = $products->where('store_id', $request->store);
        }
        $products = $products->paginate(10);
        return response()->json([
            'data' => $products->items(),
            'pageInfo' => $this->getPageInfo($products)
        ]);
    }

    /**
     * Get Page info
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $pafinated
     * @return array
     */
    protected function getPageInfo($paginated)
    {
        return [
            'current_page' => $paginated->currentPage(),
            'from' => $paginated->firstItem(),
            'last_page' => $paginated->lastPage(),
            'next_page_url' => $paginated->nextPageUrl(),
            'per_page' => $paginated->perPage(),
            'prev_page_url' => $paginated->previousPageUrl(),
            'to' => $paginated->lastItem(),
            'total' => $paginated->total(),
        ];
    }
}
