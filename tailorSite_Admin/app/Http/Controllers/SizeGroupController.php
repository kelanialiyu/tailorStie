<?php

namespace App\Http\Controllers;

use App\Models\SizeGroup;
use Illuminate\Http\Request;

class SizeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SizeGroup::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("configuration.sizegroup.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SizeGroup  $sizeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SizeGroup $sizeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SizeGroup  $sizeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeGroup $sizeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SizeGroup  $sizeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeGroup $sizeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SizeGroup  $sizeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeGroup $sizeGroup)
    {
        //
    }
}
