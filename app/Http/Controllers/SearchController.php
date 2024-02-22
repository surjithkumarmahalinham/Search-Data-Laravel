<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\tblCustomer;
use DB;
class SearchController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_customers')->get();
        return view('index',compact('data'));
    }
    public function get_result(Request $reuest)
    {
        $search_data = $reuest['search'];
        $data = DB::table('tbl_customers');
        if(!empty($search_data))
        {
            $data->where('first_name','LIKE','%'.$search_data.'%');
            $data->whereOr('last_name','LIKE','%'.$search_data.'%');
            $data->whereOr('city','LIKE','%'.$search_data.'%');
            $data->whereOr('country','LIKE','%'.$search_data.'%');
            $data->whereOr('mobile_number','LIKE','%'.$search_data.'%');
            $data->whereOr('date_n_time','LIKE','%'.$search_data.'%');
        }
        $output = $data->get();

        return json_encode($output);
    }
}
