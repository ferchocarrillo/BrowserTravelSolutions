<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use DataTables;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Weather::all();
        return view('index', compact('registros'));
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
     * @param  \App\Http\Requests\StoreWeatherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeatherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weather  $wather
     * @return \Illuminate\Http\Response
     */
    public function show(Wather $wather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weather  $wather
     * @return \Illuminate\Http\Response
     */
    public function edit(Wather $wather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeatherRequest  $request
     * @param  \App\Models\Weather  $wather
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeatherRequest $request, Wather $wather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wather  $wather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $wather)
    {
        //
    }
    public function getRecords(Request $request)
    {
        if ($request->ajax()) {
            $data = Weather::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
