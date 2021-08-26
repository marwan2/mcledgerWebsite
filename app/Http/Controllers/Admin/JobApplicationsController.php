<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Session;
use View;
use Image;
use File;
use Str;
use App\JobApplication;
use App\Helper;

class JobApplicationsController extends InitController
{
    private $items;

    public function __construct() {
        parent::__construct();

        $this->items = 'applications';
        view()->share('page_title', 'Blog Categories');
        view()->share('single', 'Category');
        view()->share('model_url', $this->items);
    }

    public function index(Request $req) {
        $applications = new JobApplication;
        $applications = $applications->orderBy('id', 'DESC')->paginate(8);
        return view('admin.applications.index', compact('applications'));
    }

    public function create() {
        return view('admin.applications.create');
    }

    public function store(Request $request) {
        $this->validate($request, JobApplication::$rules);

        $data = $request->all();            
        $data['slug'] = Str::slug($data['title']);

        $cat = JobApplication::create($data);

        if($request->ajax()) {
            return json_encode(['status'=>'success', 'data'=>$cat]);
        }
        Session::flash('flash_message', 'Record added');
        return redirect('admin/applications');
    }

    public function show($id) {
        $row = JobApplication::findOrFail($id);
        return view('admin.applications.show', compact('row'));
    }

    public function edit($id) {
        $record = JobApplication::findOrFail($id);
        return view('admin.applications.edit', compact('record'));
    }

    public function update($id, Request $request) {
        $this->validate($request, JobApplication::$rules);
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->get('title'));
        $article = JobApplication::findOrFail($id);
        $article->update($requestData);

        Session::flash('flash_message', 'Record updated');
        return redirect('admin/applications');
    }

    public function destroy($id) {
        $article = JobApplication::findOrFail($id);
        JobApplication::destroy($id);

        Session::flash('flash_message', 'Record deleted');
        return redirect('admin/applications');
    }
}