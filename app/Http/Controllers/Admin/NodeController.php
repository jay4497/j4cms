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
        return view('admin.node', compact('nodes'));
    }

    public function getUpdate($act, $id = 0){
        $node = null;
        if($act == 'edit'){
            $node = Node::find($id);
        }
        return view('admin.node_update', compact('node'));
    }

    public function postUpdate($act, $id = 0, NodeRequest $request){
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
        $node->image = '';
        $node->content = $request->input('content');
        $node->path = $request->input('path');
        $node->show_type = $request->input('show_type');
        $node->content_type = $request->input('content_type');
        $node->url = $request->input('url');
        $node->parent_id = $request->input('parent');
        $node->order = $request->input('order');
        $dpt = $this->getDepth($request->input('parent'));
        $node->depth = $dpt['depth'];
        $node->thread = $dpt['thread'];
        if($node->save()){
            return redirect('admin/node')->with('info', 'success');
        }else{
            return redirect()->back()->withErrors(['err' => lang('failed')])->withInput();
        }
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
