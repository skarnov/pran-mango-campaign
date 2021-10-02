<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home extends Controller {

    public function index() {
        $select_gallery = DB::table('content_relation')
                ->select('fk_content_id')
                ->where('page_section', 'gallery')
                ->where('fk_page_id', 1)
                ->first();
        
        $all_galleries = DB::table('tbl_contents')
                ->where('fk_content_id', $select_gallery->fk_content_id)
                ->get();
        
        $featured_problems = DB::table('problems')
                ->leftJoin('clients', 'clients.fb_id', '=', 'problems.fb_id')
                ->where('problem_status', 'active')
                ->get();
        
        $data = array();
        $data['title'] = 'Home';
        $data['featured_problems'] = $featured_problems;
        $data['select_gallery'] = $select_gallery;  
        $data['all_galleries'] = $all_galleries;  
        $data['home'] = view('website/home', $data);
        return view('website/master', $data);
    }

    public function about() {
        $data = array();
        $data['title'] = 'About';
        $data['home'] = view('website/about', $data);
        return view('website/master', $data);
    }
    
    public function success() {
        $data = array();
        $data['title'] = 'Success';
        $data['home'] = view('website/success', $data);
        return view('website/master', $data);
    }

    public function registration() {
        $data = array();
        $data['title'] = 'Registration';
        $data['home'] = view('website/registration', $data);
        return view('website/master', $data);
    }
    
    public function save_problem(Request $request) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        $problem = array();
        $problem['fb_id'] = $request->input('facebookId');
        $problem['gender'] = $request->input('gender');
        $problem['age'] = $request->input('age');
        $problem['occupation'] = $request->input('occupation');
        $problem['area'] = $request->input('area');
        $problem['ward'] = $request->input('ward');
        $problem['city'] = $request->input('city');
        $problem['main_problem'] = $request->input('main_problem');
        $problem['solve_suggestion'] = $request->input('solve_suggestion');
        $problem['self_suggestion'] = $request->input('self_suggestion');
        $problem['volunteer'] = $request->input('volunteer');
        $problem['suggestion'] = $request->input('suggestion');
        $problem['create_time'] = $time;
        $problem['create_date'] = $date;
        DB::table('problems')->insert($problem);

        $pre_user = DB::table('clients')
                ->where('fb_id', $request->input('facebookId'))
                ->first();
        
        if(!$pre_user){
            $user = array();
            $user['fb_id'] = $request->input('facebookId');
            $user['fb_id'] = $request->input('facebookId');
            $user['client_name'] = $request->input('name');
            $user['volunteer_status'] = $request->input('volunteer');
            $user['create_time'] = $time;
            $user['create_date'] = $date;
            DB::table('clients')->insert($user);
        }
        return redirect('/registration')->with('message', 'Thank You');
    }
}