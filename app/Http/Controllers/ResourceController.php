<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use J4\Upload\J4Image;

class ResourceController extends Controller
{
    public function __construct(){

    }

    public function getUpload(){
        return view('layouts.upload');
    }

    public function postUpload($type){
        $result = [];
        if(count($_FILES) <= 0){
            $result['status'] = 'failed';
            $result['msg'] = 'no file';
            return response(json_encode($result))->header('Content-Type', 'application/json');
        }
        $files = \Request::file();
        switch($type){
            case 'image':
                $img = new J4Image();
                $result = $img->upload($files, 'assets/images/upload', true, false);
              break;
        }
        return response(json_encode($result))->header('Content-Type', 'application/json');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
