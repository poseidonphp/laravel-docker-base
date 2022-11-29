<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlockRequestRequest;
use App\Http\Requests\UpdateBlockRequestRequest;
use App\Models\Blocks\BlockRequest;

class BlockRequestController extends Controller
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
     * @param  \App\Http\Requests\StoreBlockRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blocks\BlockRequest  $blockRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BlockRequest $blockRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockRequestRequest  $request
     * @param  \App\Models\Blocks\BlockRequest  $blockRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockRequestRequest $request, BlockRequest $blockRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blocks\BlockRequest  $blockRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockRequest $blockRequest)
    {
        //
    }
}
