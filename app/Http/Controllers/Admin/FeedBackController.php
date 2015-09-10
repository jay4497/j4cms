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
        $feedbacks = FeedBack::paginate(15);
        if(\Request::has('key')){
            $key = \Request::input('key');
            $feedbacks = FeedBack::where('title', 'like', '%'.$key.'%')->paginate(15);
        }
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
        $result = false;
        $feedback = FeedBack::find($id);
        if($feedback){
            $result = $feedback->delete();
        }
        $info = ['from' => 'del', 'status' => 'failed'];
        if($result){
            $info['status'] = 'success';
            j4flash($info);
            return redirect('admin/feedback');
        }else{
            j4flash($info);
            return redirect('admin/feedback');
        }
    }

    public function postBatch($act = 'update'){
        $result = false;
        switch($act){
            case 'delete':
                $ids = \Request::input('ids');
                $idsArr = explode(',', $ids);
                $result = FeedBack::whereIn('id', $idsArr)->delete();
                break;
            case 'update':
                $key = \Request::input('key');
                $val = \Request::input('value');
                $key = $key == '_status'? 'status': '';
                if(!empty($key)){
                    $ids = \Request::input('ids');
                    $idsArr = explode(',', $ids);
                    $result = FeedBack::whereIn('id', $idsArr)->update([$key => $val]);
                }
                break;
        }
        $msg = [];
        if($result){
            $msg['status'] = 'success';
        }else{
            $msg['status'] = 'failed';
        }
        return response(json_encode($msg))->header('Content-Type', 'application/json');
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
