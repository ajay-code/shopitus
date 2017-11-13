<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\DealType;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

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
        $products = $products->paginate(8);
        return response()->json([
            'data' => $products->items(),
            'pageInfo' => $this->getPageInfo($products)
        ]);
    }

    /** 
     * Get all the Product Categories, Deal types
     * and Stores
     * 
     * @return array 
     */
    public function dropdowns()
    {   
      return response()->json([
          'product_categories' => ProductCategory::all()->pluck('name', 'id'),
          'deal_types' => DealType::all()->pluck('name', 'id'),
          'stores' => Store::all()->pluck('name', 'id')
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
