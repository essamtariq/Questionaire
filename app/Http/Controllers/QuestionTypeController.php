<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionType;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questiontypes = QuestionType::all();

        return view('questiontypes.index', compact('questiontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questiontypes.create');
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
            'question_type'=>'required'
          ]);
        $questiontype = new QuestionType();
        $questiontype->fill($request->all())->save();
          return redirect('/QuestionType')->with('success', 'Questiontype have been added');
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
        $questiontype = QuestionType::find($id);

        return view('questiontypes.edit', compact('questiontype'));
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
            'question_type'=>'required'
          ]);
        $questiontype = QuestionType::find($id);
          $questiontype->delete();
          $questiontype->fill($request->all())->save();

          return redirect('/QuestionType')->with('success', 'Questiontype has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questiontype = QuestionType::find($id);
        $questiontype->delete();
   
        return redirect('/QuestionType')->with('success', 'questiontype has been deleted Successfully');
    }
}
