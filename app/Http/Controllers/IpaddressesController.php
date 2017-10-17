<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Ipaddress;
class IpaddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$ipadd = Ipaddress::all();
        $ipadd = Ipaddress::orderBy('created_at','asc')->paginate(20);
        $title="CREATION";
        $data = array(
            'ipadd'=>$ipadd,
            'title' =>$title
        );
        return view('ipadd.ipaddress')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "CREATION";
        return view('ipadd.ipaddress_create')->with('title',$title);
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
        $max = DB::table('ipaddresses')->max('id');
        $mid = $max + 1;

        $this->validate($request,[
            'ipaddress'=>'required|ip|unique:Ipaddresses',
            'subnet_mask'=>'required|ip',
            'default_gateway'=>'nullable|ip',
            'dns_server1'=>'nullable|ip',
            'dns_server2'=>'nullable|ip'

        ]);
        $allData = $request->ipaddress.','.$request->subnet_mask.','.$request->default_gateway.','.$request->dns_server1.','.$request->dns_server2;
        DB::table('histories')->insert(
            ['users'=>$user,'module'=>'ipaddress','module_id'=>$mid,'action'=>'add','status'=>1,'created_at'=>$date,'before'=>$allData]
        );

        $ip = new Ipaddress;
        $ip->ipaddress = $request->ipaddress;
        $ip->subnet_mask = $request->subnet_mask;
        $ip->default_gateway = $request->default_gateway;
        $ip->dns_server1 = $request->dns_server1;
        $ip->dns_server2 = $request->dns_server2;
        $ip->status = 1;
        $ip->assign = 0;
        $ip->save();

        return redirect('/ipaddress')->with('success','SUCCESS ADDED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipadd = Ipaddress::find($id);
        $title = "CREATION";
        $data = array(
            'ipadd' => $ipadd,
            'title' => $title
        );

        return view('ipadd.ipaddress_show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $ipadd = Ipaddress::find($id);
        $title = "CREATION";
        $data = array(
            'ipadd'=>$ipadd,
            'title'=>$title
        );


        return view('ipadd.ipaddress_update')->with($data);
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
        $user = "alvine";
        $date = date('Y-m-d H:i:s');
        $this->validate($request,[
            'ipaddress'=>'required|ip',
            'subnet_mask'=>'required|ip',
            'default_gateway'=>'nullable|ip',
            'dns_server1'=>'nullable|ip',
            'dns_server2'=>'nullable|ip'
        ]);

        $ipadd = Ipaddress::find($id);
        $prev = $ipadd->ipaddress.",".$ipadd->subnet_mask.",".$ipadd->default_gateway.",".$ipadd->dns_server1.",".$ipadd->dns_server2;
        $after = $request->ipaddress.",".$request->subnet_mask.",".$request->default_gateway.",".$request->dns_server1.",".$request->dns_server2;
        $ipadd->ipaddress = $request->ipaddress;
        $ipadd->subnet_mask = $request->subnet_mask;
        $ipadd->default_gateway = $request->default_gateway;
        $ipadd->dns_server1 = $request->dns_server1;
        $ipadd->dns_server2 = $request->dns_server2;

        DB::table('histories')->insert(
            ['users'=>$user,'module'=>'ipaddress','module_id'=>$id,'action'=>'edit','status'=>1,'created_at'=>$date,'before'=>$prev,'after'=>$after]
        );

        $ipadd->save();
        return redirect('/ipaddress')->with('success','SUCCESS UPDATE');

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

}
