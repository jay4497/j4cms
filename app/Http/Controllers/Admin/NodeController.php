<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\NodeRequest;
use App\Http\Controllers\Controller;
use App\Node;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $nodes = Node::Top()->get();
        return view('admin.node.index', compact('nodes'));
    }

    public function getUpdate($act, $id = 0){
        $node = new Node();
        if($act != 'add'){
            $node = Node::find($id);
            if($act == 'del'){
                $info = ['from' => 'del', 'status' => 'failed'];
                if($node->delete()){
                    $info['status'] = 'success';
                    j4flash($info);
                    return redirect('admin/node');
                }else{
                    j4flash($info);
                    return redirect('admin/node');
                }
            }
        }
        $nodes = Node::Top()->get();
        return view('admin.node.update', compact('node', 'nodes'));
    }

    public function postUpdate(NodeRequest $request, $act, $id = 0){
        $node = new Node();
        if($act == 'edit'){
            $node = Node::find($id);
            if(!$node){
                return redirect()->back()->withErrors(['err' => lang('unvalid node')])->withInput();
            }
        }
        $node->name = $request->input('name');
        $node->description = $request->input('description');
        $node->keywords = $request->input('keywords');
        $node->image = $request->input('get_image');
        $node->content = $request->input('content');
        $node->path = $request->input('path');
        $node->show_type = $request->input('show_type');
        $node->content_type = $request->input('content_type');
        $node->url = $request->input('link');
        $node->parent_id = $request->input('parent');
        $node->order = $request->input('order');
        $dpt = $this->getDepth($request->input('parent'));
        $node->depth = $dpt['depth'];
        $node->thread = $dpt['thread'];
        if($node->save()){
            $info = ['from' => 'update', 'status' => 'success'];
            j4flash($info);
            return redirect('admin/node');
        }else{
            return redirect()->back()->withErrors(['err' => lang('submit failed')])->withInput();
        }
    }

    public function postBatch($act = 'update'){
        $result = false;
        switch($act){
            case 'delete':
                $ids = \Request::input('ids');
                $idsArr = explode(',', $ids);
                $result = Node::whereIn('id', $idsArr)->delete();
                break;
            case 'update':
                $key = \Request::input('key');
                $key = $key == '_parent'? 'parent_id': '';
                if(!empty($key)){
                    $val = \Request::input('value');
                    $ids = \Request::input('ids');
                    $idsArr = explode(',', $ids);
                    $dpt = $this->getDepth($val);
                    $data = [
                        $key => $val,
                        'depth' => $dpt['depth'],
                        'thread' => $dpt['thread']
                    ];
                    $result = Node::whereIn('id', $idsArr)->update($data);
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

    private function getDepth($parent_id){
        $depth = 0;
        $thread = '/';
        if($parent_id > 0){
            $parent = Node::find($parent_id);
            if($parent){
                $depth = $parent->depth + 1;
                $thread = $parent->thread.$parent_id.'/';
            }
        }
        return ['depth' => $depth, 'thread' => $thread];
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
