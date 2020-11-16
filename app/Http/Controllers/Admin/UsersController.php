<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Helper;
use Carbon\Carbon;
use Session;
use Image;
use File;
use Hash;
use Auth;

class UsersController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $users = User::whereAdmin(1)->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'=>'required|email',
        ]);
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);

        if ($request->hasFile('logo')) {
            $requestData['logo'] = Helper::upload($request, 'logo');
        }

        $requestData['admin'] = 1;
        $requestData['active'] = 1;
        $requestData['email_verified'] = 1;

        $user = User::create($requestData);

        Session::flash('flash_message', 'تم اضافة مستخدم جديد للوحة التحكم بنجاح');
        return redirect('admin/users');
    }

    public function show($id)
    {
        $user = User::whereId($id)->first();
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->first();
        //return $user->access_pages->where('page', 'admin/candidates');
        return view('admin.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email'=>'required|email',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('logo')) {
            $requestData['logo'] = Helper::upload($request, 'logo');
        }

        $user->update($requestData);

        Session::flash('flash_message', 'تم تعديل بيانات المستخدم بنجاح');
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        if(Auth::id()==$id) {
            return 'Sorry, you can not delete your account';
        }
        User::destroy($id);
        Session::flash('flash_message', 'تم حذف المستخدم بنجاح');
        return redirect('admin/users');
    }

    public function loginById($id)
    {
        Auth::loginUsingId($id);
        return redirect('/');
    }
}