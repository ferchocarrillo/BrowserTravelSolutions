<?php

namespace App\Http\Controllers;

use App\Models\Clima;
use App\Http\Requests\UpdateClimaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\CityRecord;


class ClimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $registros = Clima::get();
        return view('clima.index', compact('registros'));
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
     * @param  \App\Http\Requests\StoreClimaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());

        $validationData = $request->validate([
            'ciudad' => 'required',
            'tiempo' => 'required',
            'temperatura' => 'required',
            'pronostico' => 'required',
        ]);
        $saveData = CityRecord::create($validationData);

        return back()->with('success', 'datos registrados exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function show(Clima $clima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function edit(Clima $clima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClimaRequest  $request
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClimaRequest $request, Clima $clima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clima $clima)
    {
        //
    }
    public function search(Request $request)
    {
        $data = $request->validate([
            'city' => 'required',
        ]);

        $city = $data['city'];
        $key = config('services.owm.key');
        $registros = DB::table('city_records')->get();



        $response = Http::get(
            'https://api.openweathermap.org/data/2.5/weather?q=' .
                $city .
                '&lang=es' .
                '&appid=' .
                $key
        )->json();
        if ($response['cod'] == '200') {
            $weather = $response['weather'][0]['description'];
            $main = $response['weather'][0]['main'];
            $temp = $response['main']['temp'] - 273;
            $name = $response['name'];
            $country = $response['sys']['country'];
            $ok = $response['cod'];

            return view(
                'clima.index',
                compact(
                    'weather',
                    'main',
                    'temp',
                    'name',
                    'country',
                    'ok',
                    'registros'
                )
            );

        } else {
            $notFound = true;
            return view('clima.index', compact('notFound'));
        }
    }

}
