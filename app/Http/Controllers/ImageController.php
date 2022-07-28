<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Storage;
class ImageController extends Controller
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
            // DB::beginTransaction();

            $image = new Image;
            $imageName = time().'.png';
            // return $request;
            if($request->is_import == 'true'){

                Storage::disk('minio')->putFileAs("/public/images/", $request->file('asset_path'), $imageName);

                $image->asset_path = "/images/" .  $imageName;
                $image->patient_id = $request->patient_id;
            }else{

                // $image = base64_decode(substr($request->asset_path, strpos($request->asset_path, ",")+1));

                $data = explode(',', $request['asset_path']);
                Storage::disk('minio')->put("/public/images/".$imageName, base64_decode($data[1]),'public');

                $request['asset_path'] = "/images/" .  $imageName;
                $image->fill($request->only($image->getFillable()));
            }



            $image->save();
            // DB::commit();
            return $image;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image, $id)
    {
        return Image::wherePatientId($id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
