<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    //  categoary view
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_all', compact('category'));
    }  // end mathod
    // handle fetch all eamployees ajax request
    public function fetchAll()
    {
        $emps = Category::all();
        $output = '';
        if ($emps->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>category_icon</th>
                <th>category_name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td style="color:black;">' . $emp->id . '</td>
                <td><img src="storage/images/' . $emp->category_icon . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td style="color:black;">' . $emp->category_name . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
    // handle insert a new employee ajax request
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ecom_id' =>'required',
            'category_name' => 'required|unique:categories',
            'category_image' => 'required|image',
            'category_icon' => 'required|image',
        ],
    [
           'ecom_id.required'=>'Ecommerce Name Required'
    ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $save_url = null;
            if ($request->hasFile('category_image') && $request->category_image->isValid()) {
                // brand_image upload and save
                $image = $request->file('category_image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(150, 150)->save('upload/category/' . $name_gen);
                $save_url = 'upload/category/' . $name_gen;
            }
            $save_url_icon = null;
            if ($request->hasFile('category_icon') && $request->category_icon->isValid()) {
                // brand_image upload and save
                $icon = $request->file('category_icon');
                $name_icon = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
                Image::make($icon)->resize(100, 100)->save('upload/category/' . $name_icon);
                $save_url_icon = 'upload/category/' . $name_icon;
            }
            $category = new Category;
            $category->ecom_id = $request->input('ecom_id');
            $category->category_name = $request->input('category_name');
            $category->category_slug_name = strtolower(str_replace(' ', '-', $request->category_name ));

            $category->category_image  = $save_url;
            $category->category_icon  = $save_url_icon;
            $category->save();
            return response()->json(
                [
                    'message' => 'Category Added Successfully',
                    'category' => $category
                ]
            );
        }
    }
    // handle edit an employee ajax request
    public function edit($role, $id)
    {
        // Edit Method
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }
    // handle update an employee ajax request
    public function update(Request $request, $role, $id)
    {
        $cat = Category::find($id);
        $validator = Validator::make($request->all(), [
            'ecom_id' =>'required',
            'category_name' => 'required',

        ],
    [
           'ecom_id.required'=>'Ecommerce Name Required'
    ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
        $save_url = $cat->category_image;
        if ($request->hasFile('category_image') && $request->category_image->isValid()) {
            $this->removePreviousImage($cat->category_image);
            // cat_image update and save
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150, 150)->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;
        }
         // Carefory icon update
        $save_url_icon = $cat->category_icon;
        if ($request->hasFile('category_icon') && $request->category_icon->isValid()) {
            $this->removePreviousImage($cat->category_icon);
            // cat_image update and save
            $icon = $request->file('category_icon');
            $name_icon = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(80, 80)->save('upload/category/' . $name_icon);
            $save_url_icon = 'upload/category/' . $name_icon;
        }
        try {
            $cat->ecom_id = $request->input('ecom_id');
            $cat->category_name = $request->input('category_name');
            $cat->category_image  = $save_url;
            $cat->category_slug_name = strtolower(str_replace(' ', '-', $request->category_name ));
            $cat->category_icon  = $save_url_icon;
            $cat->update();
            return response()->json(['message' => 'Category Updated Successfully']);
            } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    }
    // function for remove previous image
    private function removePreviousImage($image)
    {
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
            return true;
        }
        return false;
    }
    // handle delete an category ajax request
    public function delete($role, $id)
    {
        $category = Category::find($id);
        $img = $category->category_image;
        $c_icon = $category->category_icon;
        if ($img & $c_icon) {
            unlink($img);
            unlink($c_icon);
        }
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


    // API Start
     public function CategoryViewApi()
    {        $category = Category::latest()->get();
        return $category;
    }
    // API End 0 =0 =1 1



      // ---------------Active-----------------
    public function CatActive($role, $id){


          Category::findOrFail($id)->update(['status' => '1',]);
         $products=Product::where('category_id',$id)->update(['status' =>'1']);
        return redirect()->back();
    }
    // -----------------deactive----------------------
    public function CatDeactive($role, $id){



       Category::findOrFail($id)->update(['status' => '0',]);

       $products=Product::where('category_id',$id)->update(['status' =>'0']);

        return redirect()->back();

    }

    // for search category by  ajax
    public function searchCategoryByAjax($adminId, $value){
        $admin = Admin::where('id',$adminId)->first();
        $employeePermision = json_decode($admin->permission,true);
        $employee=$admin->employee_id;

        $categories = Category::join('ecommerce__names','categories.ecom_id','ecommerce__names.id')
                    ->where('category_name', 'LIKE', "$value%")
                    ->get();
            return response()->json(['categories'=>$categories,'employeePermision'=>$employeePermision,'employee'=>$employee]) ;
    }





}
