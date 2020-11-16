<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subscriber;
use App\Helper;
use Carbon\Carbon;
use Session;
use File;

class SubscribersController extends InitController
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.subscribers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['email' => 'required']);
        $requestData = $request->all();
        $model = Subscriber::create($requestData);

        Session::flash('flash_message', 'Subscriber added');
        return redirect('admin/subscribers');
    }

    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->read = 1;
        $subscriber->save();
        return view('admin.subscribers.show', compact('subscriber'));
    }

    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $requestData = $request->all();
        
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($requestData);

        Session::flash('flash_message', 'Subscriber updated');

        return redirect('admin/subscribers');
    }

    public function destroy($id)
    {
        Subscriber::destroy($id);
        Session::flash('flash_message', 'Subscriber deleted');
        return redirect('admin/subscribers');
    }
}
