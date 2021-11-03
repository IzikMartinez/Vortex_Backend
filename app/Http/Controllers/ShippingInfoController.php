<?php

namespace App\Http\Controllers;

use App\Models\Shipping_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShippingInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shipping_Info::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newShip = new Shipping_Info();
        $newShip->address = $request->Ship["address"];
        $newShip->address2 = $request->Ship["address2"];
        $newShip->city= $request->Ship["city"];
        $newShip->state= $request->Ship["state"];
        $newShip->zipcode= $request->Ship["zipcode"];

        return $newShip;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping_Info  $shipping_Info
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping_Info $shipping_Info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping_Info  $shipping_Info
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping_Info $shipping_Info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping_Info  $shipping_Info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping_Info $shipping_Info)
    {
        $existingShip = $shipping_Info;

        if($existingShip) {
            $existingShip->updated_at = $request->Ship["updated_at"] ? Carbon::now() : null;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping_Info  $shipping_Info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM shipping_info WHERE shipping_id = ?', [$id]);
        echo("Shipping Record deleted successfully");
        return redirect()->route('Shipping_Info.index');
    }
}
