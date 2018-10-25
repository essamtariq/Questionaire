<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionair;
use App\Question;

class QuestionairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionairs = Questionair::all();

        return view('questionairs.index', compact('questionairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'questionair_name'=>'required',
            'duration'=>'required',
            'minute_hour'=>'required',
            'resumable'=>'required'
          ]);
        $questionair = new Questionair();
        $questionair->fill($request->all())->save();
          return redirect('/Questionair')->with('success', 'Questioniar have been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionair = Questionair::find($id);
        

        return view('questionairs.edit', compact('questionair'));
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
        $request->validate([
            'questionair_name'=>'required',
            'duration'=>'required',
            'minute_hour'=>'required',
            'resumable'=>'required'
          ]);
          $questionair = Questionair::find($id);
          $questionair->delete();
          $questionair->fill($request->all())->save();

          return redirect('/Questionair')->with('success', 'Questionair has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $questionair = Questionair::find($id);
        $questionair->delete();
   
        return redirect('/Questionair')->with('success', 'Questionair has been deleted Successfully');
    }
}
