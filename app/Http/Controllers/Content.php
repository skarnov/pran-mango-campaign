<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;

class Content extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $pages = DB::table('tbl_pages')->get();
        $data = array();
        $data['title'] = 'Page Management';
        $data['all_pages'] = $pages;
        $data['config'] = $config;
        $data['home'] = view('content/manage_pages', $data);
        return view('admin/master', $data);
    }

    public function add_page() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Add Page';
        $data['config'] = $config;
        $data['home'] = view('content/add_page', $data);
        return view('admin/master', $data);
    }

    public function save_page(Request $request) {
        $current_time = date('H:i:s');
        $current_date = date('Y-m-d');
        $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data = array();
        $data['page_slug'] = $slug;
        $data['page_name'] = $request->input('name');
        $data['page_type'] = 'additional';
        $data['create_time'] = $current_time;
        $data['create_date'] = $current_date;
        $data['created_by'] = Auth::user()->id;
        DB::table('tbl_pages')->insert($data);
        return redirect('content')->with('message', 'Page Saved!');
    }

    public function edit_page($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $page_info = DB::table('tbl_pages')
                ->where('pk_page_id', $id)
                ->first();
        
        $data = array();
        
        if ($page_info->page_slug == 'home'):
            $gallery_info = DB::table('content_relation')
                ->where('page_section', 'gallery')
                ->select('pk_relation_id', 'fk_content_id', 'fk_page_id', 'page_section')
                ->first();
        
            $gallery = DB::table('tbl_contents')
                    ->where('fk_content_id', '0')
                    ->where('content_slug', 'gallery')
                    ->get();

            $data['all_galleries'] = $gallery;
            $data['gallery_info'] = $gallery_info;
        endif;

        $data['title'] = 'Edit Page';
        $data['config'] = $config;
        $data['page_info'] = $page_info;
        $data['home'] = view('content/edit_page', $data);
        return view('admin/master', $data);
    }

    public function update_page(Request $request) {
        $current_time = date('H:i:s');
        $current_date = date('Y-m-d');
        if ($request->input('slug') == 'home'):
            $slider = array();
            $slider['fk_content_id'] = $request->input('gallery_id');
            $slider['modify_time'] = $current_time;
            $slider['modify_date'] = $current_date;
            $slider['modified_by'] = Auth::user()->id;
            DB::table('content_relation')
                    ->where('page_section', 'gallery')
                    ->update($slider);
        endif;
        $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data = array();
        $data['page_slug'] = $slug;
        $data['page_name'] = $request->input('name');
        $data['modify_time'] = $current_time;
        $data['modify_date'] = $current_date;
        $data['modified_by'] = Auth::user()->id;
        DB::table('tbl_pages')
                ->where('pk_page_id', $request->input('id'))
                ->update($data);
        return redirect('content')->with('message', 'Page Updated!');
    }

    public function delete_page($id) {
        $result = DB::table('tbl_pages')->where('pk_page_id', $id)->where('page_type', 'additional')->delete();
        if ($result) {
            return redirect('content')->with('message', 'Page Deleted!');
        } else {
            return redirect('content')->with('message', 'Page Not Deleted!');
        }
    }

    public function manage_image_galleries() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $galleries = DB::table('tbl_contents')
                ->where('content_slug', 'gallery')
                ->where('fk_content_id', 0)
                ->get();
        $data = array();
        $data['title'] = 'Image Gallery Management';
        $data['all_galleries'] = $galleries;
        $data['config'] = $config;
        $data['home'] = view('content/manage_galleries', $data);
        return view('admin/master', $data);
    }

    public function add_image_gallery() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $albums = DB::table('tbl_contents')
                ->where('fk_content_id', '0')
                ->where('content_slug', 'gallery')
                ->get();
        $data = array();
        $data['title'] = 'Add Image Gallery';
        $data['config'] = $config;
        $data['all_albums'] = $albums;
        $data['home'] = view('content/add_image_gallery', $data);
        return view('admin/master', $data);
    }

    public function save_image_gallery(Request $request) {
        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();

        if ($request->input('name')) {
            $album = array();
            $album['content_slug'] = 'gallery';
            $album['content_status'] = 'published';
            $album['content_title'] = $request->input('name');
            DB::table('tbl_contents')->insert($album);

            $insert_id = DB::getPdo()->lastInsertId();
            $data['fk_content_id'] = $insert_id;
        } else {
            $data['fk_content_id'] = $request->input('album_id');
        }

        $data['content_slug'] = 'gallery';
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $i => $file) {
                $imageName = 'gallery_' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $imageName);
                $data['featured_image'] = $imageName;
                $data['create_date'] = $date;
                $data['create_time'] = $time;
                $data['created_by'] = Auth::user()->id;
                DB::table('tbl_contents')->insert($data);
            }
        }
        return redirect('content/manage_image_galleries')->with('message', 'Gallery Saved!');
    }

    public function edit_album($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $album_info = DB::table('tbl_contents')
                ->where('content_slug', 'gallery')
                ->where('fk_content_id', $id)
                ->get();
        $data = array();
        $data['title'] = 'Edit Album';
        $data['config'] = $config;
        $data['album_info'] = $album_info;
        $data['home'] = view('content/edit_album', $data);
        return view('admin/master', $data);
    }

    public function delete_image($id) {
        $image_info = DB::table('tbl_contents')
                ->where('pk_content_id', $id)
                ->first();

        $path = public_path() . "/uploads/" . $image_info->featured_image;
        @unlink($path);

        $result = DB::table('tbl_contents')->where('pk_content_id', $id)->delete();
        if ($result) {
            return redirect('content/edit_album/' . $image_info->fk_content_id)->with('message', 'Image Deleted!');
        } else {
            return redirect('content/edit_album/' . $image_info->fk_content_id)->with('message', 'Image Not Deleted!');
        }
    }

    public function delete_album($id) {
        $album_info = DB::table('tbl_contents')
                ->where('fk_content_id', $id)
                ->get();

        foreach ($album_info as $v) :
            $path = public_path() . "/uploads/" . $v->featured_image;
            @unlink($path);
        endforeach;

        $result['images'] = DB::table('tbl_contents')->where('fk_content_id', $id)->delete();
        $result['album'] = DB::table('tbl_contents')->where('pk_content_id', $id)->delete();

        if ($result) {
            return redirect('content/manage_image_galleries')->with('message', 'Image Deleted!');
        } else {
            return redirect('content/manage_image_galleries')->with('message', 'Image Not Deleted!');
        }
    }
    
    public function manage_video_galleries() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $galleries = DB::table('tbl_contents')
                ->where('content_slug', 'video')
                ->where('fk_content_id', 0)
                ->get();
        $data = array();
        $data['title'] = 'Video Gallery Management';
        $data['all_galleries'] = $galleries;
        $data['config'] = $config;
        $data['home'] = view('content/manage_video_galleries', $data);
        return view('admin/master', $data);
    }

    public function add_video_gallery() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $albums = DB::table('tbl_contents')
                ->where('fk_content_id', '0')
                ->where('content_slug', 'video')
                ->get();
        $data = array();
        $data['title'] = 'Add Video Gallery';
        $data['config'] = $config;
        $data['all_albums'] = $albums;
        $data['home'] = view('content/add_video_gallery', $data);
        return view('admin/master', $data);
    }

    public function save_video_gallery(Request $request) {
        $this->validate($request, [
            'video' => 'required',
            'video.*' => 'required',
        ]);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data = array();

        if ($request->input('name')) {
            $album = array();
            $album['content_slug'] = 'video';
            $album['content_status'] = 'published';
            $album['content_title'] = $request->input('name');
            DB::table('tbl_contents')->insert($album);

            $insert_id = DB::getPdo()->lastInsertId();
            $data['fk_content_id'] = $insert_id;
        } else {
            $data['fk_content_id'] = $request->input('album_id');
        }

        $data['content_slug'] = 'video';

        $videos = $request->input('video');
        foreach ($videos as $video) {
            $data['featured_image'] = $video;
            $data['create_date'] = $date;
            $data['create_time'] = $time;
            $data['created_by'] = Auth::user()->id;
            DB::table('tbl_contents')->insert($data);
        }

        return redirect('content/manage_video_galleries')->with('message', 'Video Gallery Saved!');
    }

    public function edit_video_album($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $album_info = DB::table('tbl_contents')
                ->where('content_slug', 'video')
                ->where('fk_content_id', $id)
                ->get();
        $data = array();
        $data['title'] = 'Edit Video Album';
        $data['config'] = $config;
        $data['album_info'] = $album_info;
        $data['home'] = view('content/edit_video_album', $data);
        return view('admin/master', $data);
    }

    public function delete_video($id) {
        $video_info = DB::table('tbl_contents')
                ->where('pk_content_id', $id)
                ->first();

        $result = DB::table('tbl_contents')->where('pk_content_id', $id)->delete();
        if ($result) {
            return redirect('content/edit_video_album/' . $video_info->fk_content_id)->with('message', 'Video Deleted!');
        } else {
            return redirect('content/edit_video_album/' . $video_info->fk_content_id)->with('message', 'Video Not Deleted!');
        }
    }

    public function delete_video_album($id) {
        $result['videos'] = DB::table('tbl_contents')->where('fk_content_id', $id)->delete();
        $result['album'] = DB::table('tbl_contents')->where('pk_content_id', $id)->delete();

        if ($result) {
            return redirect('content/manage_video_galleries')->with('message', 'Video Deleted!');
        } else {
            return redirect('content/manage_video_galleries')->with('message', 'Video Not Deleted!');
        }
    }
    
    
    
    public function filter_problem(Request $request) {
        $start =  $request->input('start');
        $end =  $request->input('end');
        
        $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $start)));
        $end_date = date('Y-m-d', strtotime(str_replace('-', '/', $end)));
       
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $problems = DB::table('problems')
                ->leftJoin('clients', 'clients.fb_id', '=', 'problems.fb_id')         
                ->whereBetween('problems.create_date', [$start_date, $end_date])
                ->paginate(10);
        $data = array();
        $data['title'] = 'Problem Filter';
        $data['all_problems'] = $problems;
        $data['config'] = $config;
        $data['home'] = view('content/manage_problems', $data);
        return view('admin/master', $data);
    }
    
    public function manage_problems() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $problems = DB::table('problems')
                ->select('problems.*', 'clients.client_name', 'clients.volunteer_status', 'clients.fb_id')
                ->leftJoin('clients', 'clients.fb_id', '=', 'problems.fb_id')
                ->orderBy('pk_problem_id', 'DESC')
                ->paginate(10);
        $data = array();
        $data['title'] = 'Problem Management';
        $data['all_problems'] = $problems;
        $data['config'] = $config;
        $data['home'] = view('content/manage_problems', $data);
        return view('admin/master', $data);
    }
    
    public function feature_problem_yes($id) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        $data = array();
        $data['problem_status'] = 'active';
        $data['modify_time'] = $time;
        $data['modify_date'] = $date;
        DB::table('problems')
                ->where('pk_problem_id', $id)
                ->update($data);
        return redirect('content/manage_problems')->with('message', 'Problem Updated!');
    }
    
    public function feature_problem_no($id) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        $data = array();
        $data['problem_status'] = 'inactive';
        $data['modify_time'] = $time;
        $data['modify_date'] = $date;
        DB::table('problems')
                ->where('pk_problem_id', $id)
                ->update($data);
        return redirect('content/manage_problems')->with('message', 'Problem Updated!');
    }
    
    public function delete_problem($id) {
        $result = DB::table('problems')->where('pk_problem_id', $id)->delete();

        if ($result) {
            return redirect('content/manage_problems')->with('message', 'Problem Deleted!');
        } else {
            return redirect('content/manage_problems')->with('message', 'Problem Not Deleted!');
        }
    }
}