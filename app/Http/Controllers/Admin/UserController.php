<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $users = User::paginate(15);
        return view('admin.user.index', compact('users'));
    }

    public function getUpdate($act, $id = 0){
        $user = null;
        if($act != 'add'){
            $user = User::find($id);
            if($act == 'delete'){
                // the user table cannot be empty
                if(User::count() == 1){
                    return redirect('admin/user?from=del&status=failed');
                }
                if($user->delete()){
                    return redirect('admin/user?from=del&status=success');
                }else{
                    return redirect('admin/user?from=del&status=failed');
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
            return redirect('admin/user?from=update&status=success');
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
