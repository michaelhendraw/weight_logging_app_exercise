<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $weights = Weight::orderBy('date','desc')->paginate(5);
        // return view('weights.index',compact('weights'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        $weights = Weight::sortable()->paginate(2);
        return view('weights.index',compact('weights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); exit;
        request()->validate([
            'date' => 'required|date|unique:weights',
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);
        Weight::create($request->all());
        return redirect()->route('weights.index')
                        ->with('success','Weight created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        return view('weights.show',compact('weight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        return view('weights.edit',compact('weight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $weight)
    {
        request()->validate([
            'date' => 'required|date|unique:weights,date,'.$weight->id,
            'min' => 'required|integer',
            'max' => 'required|integer',
        ]);
        $weight->update($request->all());
        return redirect()->route('weights.index')
                        ->with('success','Weight updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Weight::destroy($id);
        return redirect()->route('weights.index')
                        ->with('success','Weight deleted successfully');
    }
}
