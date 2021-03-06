<?php

namespace App\Http\Controllers;

use App\Model\Advert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Library\FileManager;

class AdvertController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Advert::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advert = new Advert();
        $advert->user_id = Auth()->user()->id;
        $advert->week = $request->week;
        $advert->date = date('Y-m-d H:i:s', strtotime($request->date));
        if($request->hasFile('horizontal')){
            $advert->horizontal = FileManager::store($request->horizontal);
        }

        if($request->hasFile('vertical')){
            $advert->vertical = FileManager::store($request->vertical);
        }
        $advert->status = $request->status;
        $advert->starting = date('Y-m-d H:i:s', strtotime($request->starting));

        $advert->save();

        return response('Advert Created', Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        return $advert;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        $advert->update($request->all());
        return response('Advert Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        $advert->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
