<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all(); //get all data in model
        return view('admin.category.index', compact('category')); //pass all data to the view
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category(); //create object from model

        // for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getclientoriginalextension();
            $filename = time() . '.' . $ext;

            $file->move('assets/uploads/category', $filename); //save image in file in public/asstes/uploads/category
            $category->image = $filename; //store in database
        }

        // for the rest of data
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->papular = $request->input('papular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->save();

        return redirect('dashboard')->with('status', "Category Added Successfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getclientoriginalextension();
                $filename = time() . '.' . $ext;

                $file->move('assets/uploads/category', $filename); //save image in file in public/asstes/uploads/category
                $category->image = $filename; //store in database

            }

            // for the rest of data
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == TRUE ? '1' : '0';
            $category->papular = $request->input('papular') == TRUE ? '1' : '0';
            $category->meta_title = $request->input('meta_title');
            $category->meta_keywords = $request->input('meta_keywords');
            $category->meta_descrip = $request->input('meta_description');
            $category->update();
            return redirect('categories')->with('status', "Category Updated Successfully");
        }
    }
    public function destroy($id)
    {
       $category=Category::find($id);
       if($category->image)
       {
        $path = 'assets/uploads/category/' . $category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
       }
       $category->delete();
       return redirect('categories')->with('status', "Category Deleted Successfully");
 
    }
}
