<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

use function GuzzleHttp\Promise\all;
use function PHPSTORM_META\map;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        // $options = $roles->map(function($role) {
             
        //     return array_push($role->id, $role->name);
        // });

        Session::flash('msg', 'New user has been created');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        if(trim($request->password) != '') $user->password = bcrypt($request->password);
        $user->email = $request->email;

        $user->is_active = ($request->status)? $request->status : 0;
        $user->role_id = $request->role_id;
        

        if($file = $request->photo) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $user->photo_id = $photo->id;
        } 
        Session::flash('msg', 'New user has been created');
        $user->save();

        // return redirect()->action('AdminUsersController@index');
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();


        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;

        if(trim($request->password) != '') $user->password = bcrypt($request->password);
        $user->email = $request->email;

        $user->is_active = ($request->is_active)? $request->is_active : 0;
        $user->role_id = $request->role_id;
        

        if($file = $request->photo) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $user->photo_id = $photo->id;
        } 
        Session::flash('msg', "User $id has been updated");
        $user->update();

        // return $request->all();
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Session::flash('msg', "User $id has been deleted");
        unlink(public_path(). '/' . $user->photos->path);
        $user->delete();

        // return Session::all();
        return redirect('admin/users');
    }
}
