<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIpAddressRequest;
use App\Http\Requests\UpdateIpAddressRequest;
use App\Models\IpAddress;

class IpAddressController extends Controller
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
     * @param  \App\Http\Requests\StoreIpAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIpAddressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return \Illuminate\Http\Response
     */
    public function show(IpAddress $ipAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIpAddressRequest  $request
     * @param  \App\Models\IpAddress  $ipAddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIpAddressRequest $request, IpAddress $ipAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(IpAddress $ipAddress)
    {
        //
    }
}
