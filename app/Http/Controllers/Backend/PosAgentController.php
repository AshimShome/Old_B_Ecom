<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\District;



class PosAgentController extends Controller
{
    public function search($id)
    {
        $products = DB::table('products')->where('product_name', 'Like', '%' . $id . '%')->get();
        return response()->json($products);
    }
    public function pos(Request $request)
    {
        $categorys = Category::all();
        $brands = Brand::all();
        $products = Product::paginate(30);
         if($request->ajax()){
            return $products;
        }
         $district = District::all();
         $customers = User::where('agent_id', Auth::guard('admin')->user()->agent_id)->latest()->get();
         $count = 4;
         $dates = [];
         $date = Carbon::now();
         $dates[] = Carbon::now()->format('m/d/Y');
         for ($i = 0; $i < $count; $i++) { $dates[]=$date->addDay()->format('m/d/Y');
             }
        return view('backend.pos.agent_pos', compact('categorys', 'brands', 'products', 'customers','dates','district'));
    }





    public function PosProductList($categorie_id)
    {
        if ($categorie_id == 0) {
            $product = Product::all();
            return $product;
        } else {
            $product = Product::where('category_id', $categorie_id)->get();

            return $product;
        }
    }
    public function PosBrandProductList($brand_id)
    {
        if ($brand_id == 0) {
            $brand = Product::all();
            return  $brand;
        } else {
            $brand = Product::where('brand_id', $brand_id)->get();

            return  $brand;
        }
    }
} // main end
