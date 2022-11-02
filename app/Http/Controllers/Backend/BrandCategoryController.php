<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandCategory;

class BrandCategoryController extends Controller
{
      // brandcategory view
     public function AddBrandCategory()
    {
        return view('backend.brandcategory.brandcategory_add');
    }

}
