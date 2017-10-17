<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Report;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "NETWORK";
        $rep = DB::table('reports')
                ->join('subjects','subjects.id','=','reports.reported_by')
                ->select('reports.status','reports.id','reports.ticket','reports.problem','reports.history','reports.created_at','subjects.name','subjects.location')
                ->get();
        $data = array(
            'title'=> $title,
            'rep'=>$rep

        );
        return view('netreport.report')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "NETWORK";
        $sub = DB::select("SELECT name,id FROM subjects WHERE status = 1");
        $data = array(
            'title'=>$title,
            'sub'=>$sub
        );
        return view('netreport.report_create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'reported_by'=>'required',
            'problem'=>'required|max:500'

        ]);

        $rep = new Report;
        $rep->reported_by = $request->reported_by;
        $rep->ticket = $request->ticket;
        $rep->problem = $request->problem;
        $rep->status = 1;
        $rep->save();

        return redirect('/reports')->with('success','SUCCESS GENERATE TICKET');
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

        $data = array(
            'title'=>$title
        );

        return view('netreport.report_show')->with($data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
