<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class eventController extends Controller
{
    public function liveSearch(Request $request) {

    	if($request->ajax()) {
		      $output = '';
		      $query = $request->get('query');

		      if($query != ''){

			       $data = DB::table('annonces')
			         ->where('titre', 'like', '%'.$query.'%')
			         ->orWhere('prix', 'like', '%'.$query.'%')
			         ->orWhere('wilaya', 'like', '%'.$query.'%')
			         ->orWhere('created_at', 'like', '%'.$query.'%')
			         ->get();	

		      } else {

			       $data = DB::table('annonces')
			         ->get();
		      }

		      $total_row = $data->count();
		      if($total_row > 0){
		       foreach($data as $row){
			        $output .= '
			        <tr>
			         <td>'.$row->titre.'</td>
			         <td>'.$row->prix.'</td>
			         <td>'.$row->wilaya.'</td>
			        </tr>';
		       }
		      } else {
		       $output = '
		       <tr>
		        <td align="center" colspan="5">No Data Found</td>
		       </tr>
		       ';
		      }
		      $data = array(
		       'table_data'  => $output
		      );

		      echo json_encode($data);
		     }
    }
}
