<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDomainBlockRequestRequest;
use App\Http\Requests\UpdateDomainBlockRequestRequest;
use App\Models\Blocks\DomainBlockRequest;

class DomainBlockRequestController extends Controller
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
     * @param  \App\Http\Requests\StoreDomainBlockRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDomainBlockRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blocks\DomainBlockRequest  $domainBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function show(DomainBlockRequest $domainBlockRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDomainBlockRequestRequest  $request
     * @param  \App\Models\Blocks\DomainBlockRequest  $domainBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDomainBlockRequestRequest $request, DomainBlockRequest $domainBlockRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blocks\DomainBlockRequest  $domainBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainBlockRequest $domainBlockRequest)
    {
        //
    }
}
