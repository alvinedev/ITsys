<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class MiscsController extends Controller
{
    public function disSearch(){
    	$title = "SEARCH";

    	$sub = DB::select("SELECT name,id FROM subjects WHERE status = 1 ORDER BY name ASC");
    	$data = array(
    		'sub'=>$sub,
    		'title'=>$title
    	);
    	return view('misc.search')->with($data);

    }
    public function getSearch(request $request){
    	$id = $request->id;
    	$info = DB::table('subjects')
    			->join('ipaddresses','subjects.assign','=','ipaddresses.id')
    			->select('subjects.*','ipaddresses.*')
    			->where('subjects.id','=',$id)
    			->get();
    			return $info;
    }

    public function disHistory(){
        $title = "HISTORY";
        $hist = DB::table('histories')
                    ->select('*')
                    ->where('status','=',1)
                    ->paginate(10);
        $data = array(
            'title'=>$title,
            'hist'=>$hist
        );

        return view('misc.history')->with($data);
    }
    public function viewHistory($id){
        $title = "HISTORY";
        $idd = Crypt::decrypt($id);
        $his = DB::table('histories')
                ->select('module')
                ->where('id','=',$idd)
                ->get();
        foreach($his as $h){
            if($h->module == "subjects"){
                $history = DB::table('histories')
                            ->join('subjects','histories.module_id','=','subjects.id')
                            ->select('subjects.*','histories.before','histories.module','histories.action','histories.after','histories.created_at as created_date')
                            ->where('histories.id','=',$idd)
                            ->get();
            }elseif($h->module == "ipaddress"){
                $history = DB::table('histories')
                            ->join('ipaddresses','histories.module_id','=','ipaddresses.id')
                            ->select('ipaddresses.*','histories.before','histories.module','histories.action','histories.after','histories.created_at as created_date')
                            ->where('histories.id','=',$idd)
                            ->get();
            }elseif($h->module == "Ipinventory"){
                $history = DB::table('histories')
                            ->join('ipinventories','histories.module_id','=','ipinventories.id')
                            ->select('ipinventories.*','histories.prev_content','histories.module','histories.action')
                            ->where('histories.id','=',$idd)
                            ->get();
            }else{
                $history = "";
            }

        }//end foreach
            $data = array(
                'title'=>$title,
                'history'=>$history
            );
            return view('misc.history_show')->with($data);
    }

    public function subsearch(){
        return "a";
    }


}
