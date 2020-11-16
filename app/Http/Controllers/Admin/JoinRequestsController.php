<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Session;
use View;
use File;
use App\JoinRequest;
use App\Helper;

class JoinRequestsController extends InitController
{
    public function __construct() {
        parent::__construct();
    }

    public function index(Request $req)
    {
        $requests = new JoinRequest;
        $requests = $requests->orderBy('id', 'DESC');
        $requests = $requests->paginate(10);

        return view('admin.join_requests.index', compact('requests'));
    }

    public function create() {
        return view('admin.join_requests.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        $request = JoinRequest::create($data);

        Session::flash('flash_message', 'تم اضافة الصفحة بنجاح');
        return redirect('admin/join_requests');
    }

    public function show($id) {
        $record = JoinRequest::findOrFail($id);
        return view('admin.join_requests.show', compact('record'));
    }

    public function edit($id) {
        $request = JoinRequest::findOrFail($id);
        return view('admin.join_requests.edit', compact('request'));
    }

    public function update($id, Request $request) {
        $requestData = $request->all();
        $request = JoinRequest::findOrFail($id);
        $request->update($requestData);

        Session::flash('flash_message', 'تم تعديل الصفحة بنجاح');
        return redirect('admin/join_requests');
    }

    public function destroy($id) {
        $request = JoinRequest::findOrFail($id);
        JoinRequest::destroy($id);

        Session::flash('flash_message', 'Deleted successfully');
        return redirect('admin/join_requests');
    }
}