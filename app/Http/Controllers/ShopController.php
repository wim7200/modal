<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\Models\Tool;
use Illuminate\Http\Response;

class  ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tools = Tool::with('latestRent', 'company');
        return view('shop.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShopRequest $request
     * @return Response
     */
    public function store(StoreShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Shop $shop
     * @return Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShopRequest $request
     * @param Shop $shop
     * @return Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
