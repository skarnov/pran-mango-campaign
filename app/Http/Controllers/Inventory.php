<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;

class Inventory extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function manage_categories() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $categories = DB::table('tbl_categories')->get();
        $data = array();
        $data['title'] = 'Categories';
        $data['config'] = $config;
        $data['all_categories'] = $categories;
        $data['home'] = view('inventory/manage_categories', $data);
        return view('admin/master', $data);
    }

    public function add_category() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Add Category';
        $data['config'] = $config;
        $data['home'] = view('inventory/add_category', $data);
        return view('admin/master', $data);
    }

    public function save_category(Request $request) {
        $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('name');
        /* Start Image Upload */
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        /* End Image Upload */
        /* Start Image Thumbnail */
        $imagePath = public_path('uploads/' . $imageName);
        $img = Image::make($imagePath)->resize(100, 100, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(public_path('uploads/thumbnails/' . $imageName));
        /* End Image Thumbnail */
        $data['category_image'] = $imageName;
        $data['category_status'] = $request->input('status');
        $data['create_date'] = $date;
        $data['create_time'] = $time;
        $data['created_by'] = Auth::user()->id;
        DB::table('tbl_categories')->insert($data);
        return redirect('inventory/manage_categories')->with('message', 'Category Saved!');
    }

    public function edit_category($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $category_info = DB::table('tbl_categories')
                ->where('pk_category_id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Category';
        $data['config'] = $config;
        $data['category_info'] = $category_info;
        $data['home'] = view('inventory/edit_category', $data);
        return view('admin/master', $data);
    }

    public function update_category(Request $request) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('name');
        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* End Image Upload */
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(100, 100, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            $data['category_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }
        $data['category_status'] = $request->input('status');
        $data['modify_date'] = $date;
        $data['modify_time'] = $time;
        $data['modified_by'] = Auth::user()->id;

        DB::table('tbl_categories')
                ->where('pk_category_id', $request->input('id'))
                ->update($data);
        return redirect('inventory/manage_categories')->with('message', 'Category Updated!');
    }

    public function delete_category($id) {
        $category_info = DB::table('tbl_categories')
                ->where('pk_category_id', $id)
                ->first();
        $path = public_path() . "/uploads/" . $category_info->category_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $category_info->category_image;
        @unlink($path);
        @unlink($path_thumbnails);
        $result = DB::table('tbl_categories')->where('pk_category_id', $id)->delete();
        if ($result) {
            return redirect('inventory/manage_categories')->with('message', 'Category Deleted!');
        } else {
            return redirect('inventory/manage_categories')->with('message', 'Category Not Deleted!');
        }
    }

    public function manage_products() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $categories = DB::table('tbl_categories')->get();
        $products = DB::table('tbl_products')
                ->leftJoin('tbl_categories', 'tbl_categories.pk_category_id', '=', 'tbl_products.fk_category_id')
                ->orderBy('pk_product_id', 'DESC')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Products';
        $data['config'] = $config;
        $data['all_categories'] = $categories;
        $data['all_products'] = $products;
        $data['home'] = view('inventory/manage_products', $data);
        return view('admin/master', $data);
    }

    public function filter_products() {
        $category = filter_input(INPUT_GET, 'category');
        $name = filter_input(INPUT_GET, 'name');
        $status = filter_input(INPUT_GET, 'status');

        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $categories = DB::table('tbl_categories')->get();
        $products = DB::table('tbl_products')
                ->leftJoin('tbl_categories', 'tbl_categories.pk_category_id', '=', 'tbl_products.fk_category_id')
                ->when($category, function ($query, $category) {
                    return $query->where('tbl_products.fk_category_id', '=', $category);
                })
                ->when($name, function ($query, $name) {
                    return $query->where('tbl_products.product_name', 'like', "$name%");
                })
                ->when($status, function ($query, $status) {
                    return $query->where('tbl_products.product_status', '=', $status);
                })
                ->orderBy('pk_product_id', 'DESC')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Products';
        $data['config'] = $config;
        $data['all_products'] = $products;        
        $data['all_categories'] = $categories;
        echo view('inventory/filter_products', $data);
    }

    public function add_product() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $categories = DB::table('tbl_categories')->where('category_status', 'published')->get();
        $data = array();
        $data['title'] = 'Add Product';
        $data['config'] = $config;
        $data['all_categories'] = $categories;
        $data['home'] = view('inventory/add_product', $data);
        return view('admin/master', $data);
    }

    public function save_product(Request $request) {
        $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();
        $data['fk_category_id'] = $request->input('category_id');
        $data['product_name'] = $request->input('name');
        /* Start Image Upload */
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        /* Start Image Thumbnail */
        $imagePath = public_path('uploads/' . $imageName);
        $img = Image::make($imagePath)->resize(100, 100, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(public_path('uploads/thumbnails/' . $imageName));
        /* End Image Thumbnail */
        /* End Image Upload */
        $data['product_image'] = $imageName;
        /* Start Additional Image Upload */
        $images = array();
        if ($request->hasFile('additional_image')) {
            /* Start Image Upload */
            request()->validate([
                'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $additionalName = 'additional_image_' . time() . '.' . request()->additional_image->getClientOriginalExtension();
            request()->additional_image->move(public_path('uploads'), $additionalName);
            /* End Image Upload */
            $images['additional_image'] = $additionalName;
        }

        if ($request->hasFile('extra_image')) {
            /* Start Image Upload */
            request()->validate([
                'extra_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $extraName = 'extra_image_' . time() . '.' . request()->extra_image->getClientOriginalExtension();
            request()->extra_image->move(public_path('uploads'), $extraName);
            /* End Image Upload */
            $images['extra_image'] = $extraName;
        }

        if ($request->hasFile('supplementary_image')) {
            /* Start Image Upload */
            request()->validate([
                'supplementary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $supplementaryName = 'supplementary_image_' . time() . '.' . request()->supplementary_image->getClientOriginalExtension();
            request()->supplementary_image->move(public_path('uploads'), $supplementaryName);
            /* End Image Upload */
            $images['supplementary_image'] = $supplementaryName;
        }
        $data['additional_images'] = json_encode($images);
        /* End of Additional Image Upload */

        $data['product_price'] = $request->input('price');
        $data['promotional_price'] = $request->input('promotional_price');
        $data['product_unit'] = $request->input('unit');
        $data['product_summary'] = $request->input('summary');
        $data['buy_link'] = $request->input('buy_link');

        $description = array();
        $description['product_description'] = $request->input('description');
        $description['product_information'] = $request->input('information');

        $data['product_descriptions'] = json_encode($description);

        $data['product_mark'] = $request->input('product_mark');

        $data['product_status'] = $request->input('status');
        $data['create_date'] = $date;
        $data['create_time'] = $time;
        $data['created_by'] = Auth::user()->id;
        DB::table('tbl_products')->insert($data);
        return redirect('inventory/manage_products')->with('message', 'Product Saved!');
    }

    public function edit_product($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $categories = DB::table('tbl_categories')->where('category_status', 'published')->get();
        $product_info = DB::table('tbl_products')
                ->where('pk_product_id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Product';
        $data['config'] = $config;
        $data['all_categories'] = $categories;
        $data['product_info'] = $product_info;
        $additional_images = $product_info->additional_images;
        $additional_image = json_decode($additional_images);
        $data['product_info']->additional_image = isset($additional_image->additional_image) ? $additional_image->additional_image : '';
        $data['product_info']->extra_image = isset($additional_image->extra_image) ? $additional_image->extra_image : '';
        $data['product_info']->supplementary_image = isset($additional_image->supplementary_image) ? $additional_image->supplementary_image : '';
        $product_descriptions = $product_info->product_descriptions;
        $product_description = json_decode($product_descriptions);
        $data['product_info']->product_description = isset($product_description->product_description) ? $product_description->product_description : '';
        $data['product_info']->product_information = isset($product_description->product_information) ? $product_description->product_information : '';
        $data['home'] = view('inventory/edit_product', $data);
        return view('admin/master', $data);
    }

    public function update_product(Request $request) {
        $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();
        $data['fk_category_id'] = $request->input('category_id');
        $data['product_name'] = $request->input('name');

        if ($request->hasFile('image')) {
            /* Start Image Upload */
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            /* Start Image Thumbnail */
            $imagePath = public_path('uploads/' . $imageName);
            $img = Image::make($imagePath)->resize(100, 100, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('uploads/thumbnails/' . $imageName));
            /* End Image Thumbnail */
            /* End Image Upload */
            $data['product_image'] = $imageName;

            $path = public_path() . '/uploads/' . $request->input('previous_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        /* Start Additional Image Upload */
        $images = array();
        if ($request->hasFile('additional_image')) {
            /* Start Image Upload */
            request()->validate([
                'additional_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $additionalName = 'additional_image_' . time() . '.' . request()->additional_image->getClientOriginalExtension();
            request()->additional_image->move(public_path('uploads'), $additionalName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_additional_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_additional_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $images['additional_image'] = isset($additionalName) ? $additionalName : $request->input('previous_additional_image');

        if ($request->hasFile('extra_image')) {
            /* Start Image Upload */
            request()->validate([
                'extra_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $extraName = 'extra_image_' . time() . '.' . request()->extra_image->getClientOriginalExtension();
            request()->extra_image->move(public_path('uploads'), $extraName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_extra_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_extra_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }

        $images['extra_image'] = isset($extraName) ? $extraName : $request->input('previous_extra_image');

        if ($request->hasFile('supplementary_image')) {
            /* Start Image Upload */
            request()->validate([
                'supplementary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $supplementaryName = 'supplementary_image_' . time() . '.' . request()->supplementary_image->getClientOriginalExtension();
            request()->supplementary_image->move(public_path('uploads'), $supplementaryName);
            /* End Image Upload */

            $path = public_path() . '/uploads/' . $request->input('previous_supplementary_image');
            if ($path) {
                @unlink($path);
            }

            $path_thumbnails = public_path() . '/uploads/thumbnails/' . $request->input('previous_supplementary_image');
            if ($path_thumbnails) {
                @unlink($path_thumbnails);
            }
        }
        $images['supplementary_image'] = isset($supplementaryName) ? $supplementaryName : $request->input('previous_supplementary_image');

        $data['additional_images'] = json_encode($images);
        /* End of Additional Image Upload */

        $data['product_price'] = $request->input('price');
        $data['promotional_price'] = $request->input('promotional_price');
        $data['product_unit'] = $request->input('unit');
        $data['product_summary'] = $request->input('summary');
        $data['buy_link'] = $request->input('buy_link');

        $description = array();
        $description['product_description'] = $request->input('description');
        $description['product_information'] = $request->input('information');

        $data['product_descriptions'] = json_encode($description);

        $data['product_mark'] = $request->input('product_mark');

        $data['product_status'] = $request->input('status');
        $data['modify_date'] = $date;
        $data['modify_time'] = $time;
        $data['modified_by'] = Auth::user()->id;

        DB::table('tbl_products')
                ->where('pk_product_id', $request->input('id'))
                ->update($data);
        return redirect('inventory/manage_products')->with('message', 'Product Updated!');
    }

    public function delete_product($id) {
        $product_info = DB::table('tbl_products')
                ->where('pk_product_id', $id)
                ->first();
        $path = public_path() . "/uploads/" . $product_info->product_image;
        $path_thumbnails = public_path() . "/uploads/thumbnails/" . $product_info->product_image;
        @unlink($path);
        @unlink($path_thumbnails);
        $result = DB::table('tbl_products')->where('pk_product_id', $id)->delete();
        if ($result) {
            return redirect('inventory/manage_products')->with('message', 'Product Deleted!');
        } else {
            return redirect('inventory/manage_products')->with('message', 'Product Not Deleted!');
        }
    }
}