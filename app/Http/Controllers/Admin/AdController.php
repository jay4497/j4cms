<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ad;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $ads = Ad::paginate(15);
        return view('admin.ad.index', compact('ads'));
    }

    public function getUpdate($act, $id = 0){
        $ad = null;
        if($act != 'add'){
            $ad = Ad::find($id);
            if($act == 'delete'){
                if($ad->delete()){
                    return redirect('admin/ad?from=del&status=success');
                }else{
                    return redirect('admin/ad?from=del&status=failed');
                }
            }
        }
        return view('admin.ad.update', compact('ad'));
    }

    public function postUpdate(Requests\Admin\AdRequest $request, $act, $id = 0){
        $ad = new Ad();
        if($act == 'edit'){
            $ad = Ad::find($id);
        }
        $ad->title = $request->input('title');
        $ad->description = $request->input('description');
        $ad->url = $request->input('url');
        $ad->type = $request->input('type');
        $ad->image = $request->input('image');
        $ad->code = $request->input('code');
        $ad->width = $request->input('width');
        $ad->height = $request->input('height');
        $ad->order = $request->input('order');
        if($ad->save()){
            return redirect('admin/ad?from=update&status=success');
        }else{
            return redirect('admin/ad?from=update&status=failed');
        }
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
