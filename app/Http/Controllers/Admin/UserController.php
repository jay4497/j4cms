<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except' => ['login']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $users = User::paginate(15);
        if(\Request::has('key')){
            $key = \Request::input('key');
            $users = User::where('name', 'like', '%'.$key.'%')->paginate(15);
        }
        return view('admin.user.index', compact('users'));
    }

    public function getUpdate($act, $id = 0){
        $user = new User();
        if($act != 'add'){
            $user = User::find($id);
            if($act == 'delete'){
                $info = ['from' => 'del', 'status' => 'failed'];
                // the user table cannot be empty
                if(User::count() == 1){
                    j4flash($info);
                    return redirect('admin/user');
                }
                if($user->delete()){
                    $info['status'] = 'success';
                    j4flash($info);
                    return redirect('admin/user');
                }else{
                    j4flash($info);
                    return redirect('admin/user');
                }
            }
        }
        return view('admin.user.update', compact('user'));
    }

    public function postUpdate(Requests\Admin\UserRequest $request, $act, $id = 0){
        $user = new User();
        if($act == 'edit'){
            $user = User::find($id);
        }
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password')? : $user->password;
        if($user->save()){
            $info = ['from' => 'update', 'status' => 'success'];
            j4flash($info);
            return redirect('admin/user');
        }else{
            return redirect()->back()->withErrors(['err' => lang('submit failed')])->withInput();
        }
    }

    public function login(){
        return view('admin.login');
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
