<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Subject;
class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('name','asc')->paginate(10);
        $title = 'CREATION';
        $data = array(
            'title' => $title,
            'subjects' => $subjects
        );
        return view('pages.subject')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = "CREATION";

        $data = array(
            'title'=>$title
        );

        return view('pages.subject_create')->with($data);
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
        $max = DB::table('subjects')->max('id');
        $mid = $max + 1;
        
        $this->validate($request, [
            'name' => 'required|unique:subjects',
            'computer_name' => 'required',
            'domain_name' => 'required',
            'location' => 'required'
        ]);
        $allData = $request->name.",".$request->computer_name.",".$request->domain_name.",".$request->location;
        DB::table('histories')->insert(
            ['users'=>$user,'module'=>'subjects','module_id'=>$mid,'action'=>'add','status'=>1,'created_at'=>$date,'before'=>$allData]
        );

        $subject = new Subject;
        $subject->name = $request->name;
        $subject->computer_name = $request->computer_name;
        $subject->domain_name = $request->domain_name;
        $subject->location = $request->location;
        $subject->status = 1;
        $subject->assign = 0;
        $subject->save();

        return redirect('/subjects')->with('success','Subject Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "CREATION";
        $subject = Subject::find($id);
        $data = array(
            'title'=>$title,
            'subject'=>$subject
        );
        return view('pages.subject_show')->with($data);
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
        $title = "CREATION";
        $subject = Subject::find($id);
        $data = array(
            'title' => $title,
            'subject' => $subject
        );
        return view('pages.subject_update')->with($data);
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
        $this->validate($request, [
            'name' => 'required',
            'computer_name' => 'required',
            'domain_name' => 'required',
            'location' => 'required'
        ]);



        $subject = Subject::find($id);
        $prev = $subject->name.",".$subject->computer_name.",".$subject->domain_name.",".$subject->location;
        $after = $request->name.",".$request->computer_name.",".$request->domain_name.",".$request->location;
        $subject->name = $request->name;
        $subject->computer_name = $request->computer_name;
        $subject->domain_name = $request->domain_name;
        $subject->location = $request->location;
        

        DB::table('histories')->insert(
            ['users'=>$user,'module'=>'subjects','module_id'=>$id,'action'=>'edit','status'=>1,'created_at'=>$date,'before'=>$prev,'after'=>$after]
        );
        $subject->save();
        return redirect('/subjects')->with('success','Subject Updated');
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
