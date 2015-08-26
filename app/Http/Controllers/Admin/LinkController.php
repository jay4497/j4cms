<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $links = Link::sort()->get();
        return view('admin.link.index', compact('links'));
    }

    public function getUpdate($act, $id = 0){
        $link = null;
        if($act != 'add'){
            $link = Link::find($id);
            if($act == 'delete'){
                if($link->delete()){
                    return redirect('admin/link?from=del&status=success');
                }else{
                    return redirect('admin/link?from=del&status=failed');
                }
            }
        }
        return view('admin.link.update',compact('link'));
    }

    public function postUpdate(Requests\Admin\LinkRequest $request, $act, $id = 0){
        $link = new Link();
        if($act == 'edit'){
            $link = Link::find($id);
        }
        $link->title = $request->input('title');
        $link->description = $request->input('description');
        $link->image = $request->input('image');
        $link->url = $request->input('url');
        $link->order = $request->input('order');
        if($link->save()){
            return redirect('admin/link?from=update&status=success');
        }else{
            return redirect()->back()->withErrors(['err' => lang('submit failed')])->withInput();
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
