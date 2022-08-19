<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    private $categories;
    private $subCategories;
    private $subCategory;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.add', ['categories'=>$this->categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ],
            [
                'category_id.required'=>'Please Select Category Name',
                'name.required'=>'Sub category name is invalid',
                'status.required'=>'Publication status is invalid'
            ]
        );
        subCategory::newsubCategory($request);
        return redirect()->back()->with('message', 'Sub Category Saved Successfully');
    }

    public function manage()
    {
        $this->subCategories = subCategory::orderBy('id', 'desc')->get();
        return view('admin.sub-category.manage', ['subCategories' => $this->subCategories]);
    }

    public function edit($id)
    {
        $this->subCategory = subCategory::find($id);
        $this->categories = Category::all();
        return view('admin.sub-category.edit', [
            'subCategory' => $this->subCategory,
            'categories'=>$this->categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        subCategory::updatesubCategory($request, $id);
        return redirect('/manage-sub-category')->with('updatemessage', 'Sub Category Info Updated Successfully');
    }

    public function delete(Request $request, $id )
    {
        subCategory::deletesubCategory($id);
        return redirect('/manage-sub-category')->with('deletemessage', 'Sub category info deleted successfully');
    }
}
