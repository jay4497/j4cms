<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($type)
    {
        $articles = Article::group($type)->paginate(15);
        $nodes = \App\Node::top()->where('content_type', $type)->get();
        if(\Request::has('key')){
            $key = \Request::input('key');
            $articles = Article::where('title', 'like', '%'.$key.'%')->paginate(15);
        }
        return view('admin.article.index', compact('articles', 'nodes'));
    }

    public function getUpdate($type, $act, $id = 0){
        $nodes = \App\Node::top()->where('content_type', $type)->get();
        $article = new Article();
        $flag = 0;
        if($act != 'add'){
            $flag = 1;
            $article = Article::find($id);
            if($act == 'delete'){
                $url = \Request::header('Referer');
                $info = ['from' => 'del', 'status' => 'failed'];
                if($article->delete()){
                    $info['status'] = 'success';
                    j4flash($info);
                    return redirect($url);
                }else{
                    j4flash($info);
                    return redirect($url);
                }
            }
        }
        return view('admin.article.update', compact('flag', 'article', 'nodes'));
    }

    public function postUpdate(Requests\Admin\ArticleRequest $request, $type, $act, $id = 0){
        $article = new Article();
        if($act == 'edit'){
            $article = Article::find($id);
        }
        $article->user_id = \Auth::id();
        $article->node_id = $request->input('node');
        $article->title = $request->input('title');
        $article->seo_title = $request->input('seo_title');
        $article->description = $request->input('description');
        $article->keywords = $request->input('keywords');
        $article->type = $request->input('type');
        $article->image = $request->input('get_image');
        $article->outline = $request->input('outline')?: str_limit(strip_tags($request->input('content')));
        $article->content = $request->input('content');
        $article->order = $request->input('order');
        $article->views = $request->input('views');
        $article->hot = $request->input('hot')? 1: 0;
        $article->status = $request->input('status')? 1: 0;
        $article->recommend = $request->input('recommend')? 1: 0;
        $article->show_index = $request->input('show_index')? 1: 0;
        if($article->save()){
            $info = ['from' => 'update', 'status' => 'success'];
            j4flash($info);
            return redirect('admin/article/index/'.$type);
        }else{
            return redirect()->back()->withErrors(['err' => lang('submit failed')])->withInput();
        }
    }

    /**
     * batch update
     * @param string $act
     * @return json
     */
    public function postBatch($act = 'update'){
        $result = false;
        $ids = \Request::input('ids');
        $idsArr = explode(',', $ids);
        switch($act){
            case 'delete':
                $result = Article::whereIn('id', $idsArr)->delete();
                break;
            case 'update':
                $key = \Request::input('key');
                $value = \Request::input('value');
                $tempData = $this->parseKey($key, $value);
                $result = Article::whereIn('id', $idsArr)->update($tempData);
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
     * get the flag data to update
     * @param $key
     * @param $val
     * @return array
     */
    private function parseKey($key, $val){
        $result = [];
        switch($key){
            case '_status':
                if($val == 1){
                    $result['status'] = 1;
                }elseif($val == 0){
                    $result['status'] = 0;
                }elseif($val == 2){
                    $result['hot'] = 1;
                }elseif($val == 3){
                    $result['recommend'] = 1;
                }elseif($val == 4){
                    $result['show_index'] = 1;
                }
                break;
            case '_node':
                $result['node_id'] = $val;
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
