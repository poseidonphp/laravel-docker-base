<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIpAddressBlockRequestRequest;
use App\Http\Requests\UpdateIpAddressBlockRequestRequest;
use App\Models\Blocks\IpAddressBlockRequest;

class IpAddressBlockRequestController extends Controller
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
     * @param  \App\Http\Requests\StoreIpAddressBlockRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIpAddressBlockRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blocks\IpAddressBlockRequest  $ipAddressBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function show(IpAddressBlockRequest $ipAddressBlockRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIpAddressBlockRequestRequest  $request
     * @param  \App\Models\Blocks\IpAddressBlockRequest  $ipAddressBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIpAddressBlockRequestRequest $request, IpAddressBlockRequest $ipAddressBlockRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blocks\IpAddressBlockRequest  $ipAddressBlockRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(IpAddressBlockRequest $ipAddressBlockRequest)
    {
        //
    }
}
