<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $des = Destination::all();

        return response()->json([
            'Destinations' => $des,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'foto' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 403);
        }

        $d = new Destination();
        $d->foto = $request->foto;
        $d->nama = $request->nama;
        $d->alamat = $request->alamat;
        $d->link = $request->link;
        $d->deskripsi = $request->deskripsi;
        $d->save();

        if($d){
            return response()->json([
                'message' => 'Destination successfully added',
                'destinations' => $d
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $des = Destination::where('id', $id)->first();

        if($des){
            return response()->json([
                'destination' => $des
            ], 200);
        }
        if(!$des){
            return response()->json([
                'message' => 'Invalid id'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'foto' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 403);
        }

        $de = Destination::where('id', $id)->first();
        if($de){
            $de->foto = $request->foto;
            $de->nama = $request->nama;
            $de->alamat = $request->alamat;
            $de->link = $request->link;
            $de->deskripsi = $request->deskripsi;
            $de->save();

            return response()->json([
                'Message' => 'Successfully updated',
                'Destination' => $de
            ], 200);
        }
        if(!$de){
            return response()->json([
                'message' => 'Invalid id'
            ], 404);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d = Destination::where('id', $id)->first();
        if(!$d){
            return response()->json([
                'message' => 'Invalid id'
            ], 404);
        }
        if($d->delete()){
            return response()->json([
                'message' => 'Successfully deleted'
            ], 200);
        }

    }
}
