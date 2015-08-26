<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($type)
    {
        $articles = Article::group($type)->paginate(15);
        $nodes = \App\Node::top()->where('content_type', $type)->get();
        return view('admin.article.index', compact('articles', 'nodes'));
    }

    public function getUpdate($type, $act, $id = 0){
        $article = null;
        if($act != 'add'){
            $article = Article::find($id);
            if($act == 'delete'){
                $url = \Request::header('Referer');
                if($article->delete()){
                    return redirect($url.'?from=del&status=success');
                }else{
                    return redirect($url.'?from=del&status=failed');
                }
            }
        }
        return view('admin.article.update', compact('article'));
    }

    public function postUpdate(Requests\ArticleRequest $request, $type, $act, $id = 0){
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
        $article->outline = $request->input('outline')?: str_limit(strip_tags($request->input('content')));
        $article->content = $request->input('content');
        $article->order = $request->input('order');
        $article->hot = $request->input('hot')? 1: 0;
        $article->status = $request->input('status')? 1: 0;
        $article->recommend = $request->input('recommend')? 1: 0;
        $article->show_index = $request->input('show_index')? 1: 0;
        if($article->save()){
            return redirect('admin/article/'.$type.'?from=update&status=success');
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
