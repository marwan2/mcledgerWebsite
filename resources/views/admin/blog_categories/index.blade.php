@php
    use App\Helper;
@endphp
@extends('admin.layouts.master')
@section('title') Blog Categories - @endsection
@section('content')
    <section class="content-header">
        <h2>Blog Categories
        <a href="{{ url('admin/blog_categories/create') }}" class="btn btn-success pull-right">+ Add new category</a>
        </h2>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header with-border"></div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Active</th>
                            <th>Category name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blog_categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{!!Helper::sw($item,'active', 'BlogCategory')!!}</td>
                            <td><a href="{{url('admin/blog_categories/'.$item->id.'/edit')}}"><strong>{{$item->title}}</strong></a></td>
                            <td nowrap="">
                                <a href="{{url('admin/blog_categories/'.$item->id) }}" class="btn btn-success btn-sm" title="View"><span class="fa fa-eye"/></a>
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