@php
    use App\Helper;
@endphp
@extends('admin.layouts.master')
@section('title') Blog - Authors - @endsection
@section('content')
    <section class="content-header">
        <h2>Blog Authors
        <a href="{{ url('admin/blog_authors/create') }}" class="btn btn-success pull-right">+ Add new author</a>
        </h2>
    </section>

    <section class="content">
        <div class="card">                
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Active</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Brief</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blog_authors as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{!!Helper::sw($item,'active', 'BlogAuthor')!!}</td>
                            <td>{!!Helper::image($item->image, ['width'=>100])!!}</td>
                            <td><a href="{{url('admin/blog_authors/'.$item->id.'/edit')}}"><strong>{{$item->name}}</strong></a></td>
                            <td>{{ Str::limit(strip_tags($item->details), 150) }}</td>
                            <td nowrap="">
                                <a href="{{url('admin/blog_authors/'.$item->id) }}" class="btn btn-success btn-sm"><span class="fa fa-eye"/></a>
                                {!!Helper::info($item)!!}
                                {!!Helper::edit_ctrl($item, $model_url)!!}
                                {!!Helper::delete_ctrl($item, $model_url)!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection