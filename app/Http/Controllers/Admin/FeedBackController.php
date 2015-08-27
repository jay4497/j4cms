<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FeedBack;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $feedbacks = FeedBack::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function getShow($id){
        $feedback = FeedBack::find($id);
        if($feedback){
            return view('admin.feedback.show', compact('feedback'));
        }else{
            return redirect('admin/feedback?from=show&status=failed');
        }
    }

    public function getUpdate($act, $id){
        $ids = $id;
        if(str_contains($id, ',')){
            $ids = explode(',', $id);
        }
        $query = FeedBack::whereIn('id', $ids);
        $result = false;
        switch($act){
            case "no":
                $result = $query->update(['status' => 0]);
                break;
            case "readed":
                $result = $query->update(['status' => 1]);
                break;
            case "hidden":
                $result = $query->update(['status' => 2]);
                break;
            case "delete":
                $result = $query->delete();
                break;
        }
        if($result){
            return redirect('admin/feedback?from=update&status=success');
        }else{
            return redirect('admin/feedback?from=update&status=failed');
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
