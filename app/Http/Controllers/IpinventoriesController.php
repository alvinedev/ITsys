<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Ipinventory;
class IpinventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "NETWORK";
        //$ipinven = Ipinventory::orderBy('created_at','asc')->paginate(2);
        //$ipinven = DB::select("SELECT ip.ipaddress FROM ipinventories inv LEFT JOIN ipaddresses ip ON inv.ipaddress_id = ip.id")->get();
        $ipinven = DB::table('ipinventories')
                        ->join('subjects','ipinventories.subject_id','=','subjects.id')
                        ->join('ipaddresses','ipinventories.ipaddress_id','=','ipaddresses.id')
                        ->select('subjects.name','subjects.location','ipaddresses.ipaddress','ipinventories.created_at','ipinventories.updated_at','ipinventories.id')
                        ->orderBy('name','asc')
                        ->paginate(10);
        $data = array(
            'title'=>$title,
            'ipinven'=>$ipinven
        );

        return view('invens.ipinventory')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "NETWORK";
        $sub = DB::select("SELECT name,id FROM subjects WHERE status = 1 AND assign = 0");
        $ip = DB::select("SELECT ipaddress,id FROM ipaddresses WHERE status = 1 AND assign = 0");
        $data = array(
            'title'=>$title,
            'sub'=>$sub,
            'ip' =>$ip
        );
        return view('invens.ipinventory_create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = "alvine";
        $date = date('Y-m-d H:i:s');
        $max = DB::table('ipinventories')->max('id');
        $mid = $max + 1;

        $this->validate($request,[
            'name'=>'required',
            'ipaddress'=>'required'
        ]);

        $ipinven = new Ipinventory;
        $ipinven->subject_id = $request->name;
        $ipinven->ipaddress_id = $request->ipaddress;
        $ipinven->status = 1;
        $ipinven->save();

        DB::table('subjects')
            ->where('id',$request->name)
            ->update(['assign'=>$request->ipaddress]);

        DB::table('ipaddresses')
            ->where('id',$request->ipaddress)
            ->update(['assign'=>$request->name]);

        DB::table('histories')->insert(
            ['user'=>$user,'module'=>'Ipinventory','module_id'=>$mid,'action'=>'ADD','status'=>1,'created_at'=>$date,'prev_content'=>'N/A']
        );

        return redirect('/ipinventory')->with('success','Success Assigned');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "NETWORK";
        $ipinven = DB::table('ipinventories')
                 ->join('subjects','ipinventories.subject_id','=','subjects.id')
                 ->join('ipaddresses','ipinventories.ipaddress_id','=','ipaddresses.id')
                 ->select('subjects.name',
                    'subjects.location',
                    'ipaddresses.ipaddress',
                    'ipaddresses.subnet_mask',
                    'ipinventories.created_at',
                    'ipinventories.updated_at',
                    'ipaddresses.default_gateway',
                    'ipaddresses.dns_server1',
                    'ipaddresses.dns_server2')
                 ->where('ipinventories.id','=',$id)
                 ->get();

        $data = array(
            'title'=>$title,
            'ipinven'=> $ipinven
        );

        return view('invens.ipinventory_show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSubject(request $request){
        $id = $request->id;
        $data = DB::select("SELECT * FROM subjects WHERE id = $id");
        return $data;
        //return response()->json($data);
    }

    public function getIpadd(request $request){
        $id = $request->id;
        $data = DB::select("SELECT * FROM ipaddresses WHERE id = $id");
        return $data;
    }

}
