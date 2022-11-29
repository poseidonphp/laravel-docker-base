<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlockControlRequest;
use App\Http\Requests\UpdateBlockControlRequest;
use App\Models\Block\BlockControl;

class BlockControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlockControlRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockControlRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block\BlockControl  $blockControl
     * @return \Illuminate\Http\Response
     */
    public function show(BlockControl $blockControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockControlRequest  $request
     * @param  \App\Models\Block\BlockControl  $blockControl
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockControlRequest $request, BlockControl $blockControl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block\BlockControl  $blockControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockControl $blockControl)
    {
        //
    }
}
