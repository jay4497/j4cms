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

    public function getUpdate($act, $id = 0){
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

    public function postUpdate($act, $id = 0){

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
