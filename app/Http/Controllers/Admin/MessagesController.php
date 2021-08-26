<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Enquiry as Message;
use Illuminate\Http\Request;
use App\Helper;
use Carbon\Carbon;
use Session;
use Image;
use File;

class MessagesController extends InitController
{
    public $upload_path;

    public function __construct()
    {
        parent::__construct();
        \Carbon\Carbon::setLocale('ar');
    }

    public function index()
    {
        $messages = new Message;
        if(request()->has('type') && request()->get('type')!='') {
            $messages = $messages->whereType(request()->get('type'));
        }

        $messages = $messages->orderBy('id', 'DESC')->paginate(8);

        return view('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['email' => 'required']);
        $requestData = $request->all();
        $model = Message::create($requestData);

        Session::flash('flash_message', 'تم اضافة الرسالة بنجاح');
        return redirect('admin/messages');
    }

    public function show($id)
    {
        $message = Message::whereId($id)->with('replies')->first();
        $message->read = 1;
        $message->save();

        //check user account 
        $user = \App\User::whereEmail($message->email)->first();
        return view('admin.messages.show', compact('message', 'user'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.edit', compact('message'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
			'email' => 'required'
		]);
        $requestData = $request->all();
        $message = Message::findOrFail($id);
        $message->update($requestData);

        Session::flash('flash_message', 'تم تعديل الرسالة بنجاح');
        return redirect('admin/messages');
    }

    public function destroy($id)
    {
        Message::destroy($id);
        Session::flash('flash_message', 'Record has been deleted');
        return redirect('admin/messages');
    }
}