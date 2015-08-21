<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Navigate;
use App\Node;
use App\Http\Requests\Admin\NavigateRequest;

class NavigateController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $navigates = Navigate::top()->get();
        $nodes = Node::top()->get();
        return view('admin.nav.index', compact('navigates', 'nodes'));
    }

    public function getUpdate($act, $id = 0){
        $nav = new Navigate();
        if($act != 'add'){
            $nav = Navigate::find($id);
            if($act == 'delete'){
                $info = ['from' => 'del', 'status' => 'failed'];
                if($nav->delete()){
                    $info['status'] = 'success';
                    j4flash($info);
                    return redirect('admin/navigate');
                }else{
                    j4flash($info);
                    return redirect('admin/navigate');
                }
            }
        }
        $navigates = Navigate::top()->get();
        return view('admin.nav.update', compact('nav', 'navigates'));
    }

    public function postUpdate(NavigateRequest $request, $act, $id = 0){
        $nav = new Navigate();
        if($act == 'edit'){
            $nav = Navigate::find($id);
            if(!$nav){
                return redirect()->back()->withErrors(['err' => lang('invalid nav')])->withInput();
            }
        }
        $nav->title = $request->input('title');
        $nav->url = $request->input('url');
        $nav->status = $request->input('status');
        $nav->order = $request->input('order');
        $nav->parent_id = $request->input('parent');
        $nav->bind_node_id = $request->input('node');
        if($nav->save()){
            $info = ['from' => 'update', 'status' => 'success'];
            j4flash($info);
            return redirect('admin/navigate');
        }else{
            return redirect()->back()->withErrors(['err' => lang('submit failed')])->withInput();
        }
    }

    public function postBatch($act = 'update'){
        $result = false;
        $ids = \Request::input('ids');
        $idArr = explode(',', $ids);
        switch($act){
            case 'delete':
                $result = Navigate::whereIn('id', $idArr)->delete();
                break;
            case 'update':
                $key = \Request::input('key');
                $value = \Request::input('value');
                $tempData = $this->parseKey($key, $value);
                $result = Navigate::whereIn('id', $idArr)->update($tempData);
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

    public function parseKey($key, $value){
        $result = [];
        switch($key){
            case '_node':
                $result['bind_node_id'] = $value;
                break;
            case '_status':
                $result['status'] = $value;
                break;
        }
        return $result;
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
