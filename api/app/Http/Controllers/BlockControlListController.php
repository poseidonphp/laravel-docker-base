<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlockControlListRequest;
use App\Http\Requests\UpdateBlockControlListRequest;
use App\Models\Blocks\BlockControlList;

class BlockControlListController extends Controller
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
     * @param  \App\Http\Requests\StoreBlockControlListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockControlListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blocks\BlockControlList  $blockControlList
     * @return \Illuminate\Http\Response
     */
    public function show(BlockControlList $blockControlList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockControlListRequest  $request
     * @param  \App\Models\Blocks\BlockControlList  $blockControlList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockControlListRequest $request, BlockControlList $blockControlList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blocks\BlockControlList  $blockControlList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockControlList $blockControlList)
    {
        //
    }
}
