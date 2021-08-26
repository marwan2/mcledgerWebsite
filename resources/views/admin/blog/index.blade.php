<?php
    use App\Helper;
    use App\Blog;
    $categories = Arr::prepend($categories->toArray(), 'All categories','');
    $authors = Arr::prepend($authors->toArray(), 'All authors','');
?>
@extends('admin.layouts.master')
@section('title') Blog - @endsection
@section('content')
    <section class="content-header">
        <h2 class="text-primary font-weight-bold">Blog
            <small>(Total: {{$blog->total()}})</small>
            <a href="{{ url('admin/blog/create') }}" class="btn btn-success pull-right">+ Add new article</a>
        </h2>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                {!!Form::open(['method'=>'GET','class'=>'form-inline form-filter'])!!}
                    <div class="form-group">
                        {!!Form::select('category_id', $categories, Request::get('category_id'), ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::select('author_id', $authors, Request::get('author_id'), ['class'=>'form-control'])!!}
                    </div>
                {!!Form::close()!!}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Active</th>
                            <th>Featured</th>
                            <th>Category</th>
                            <th>Article Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blog as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{!!Helper::sw($item,'active','Blog')!!}</td>
                            <td>{!!Helper::sw($item,'featured','Blog')!!}</td>
                            <td>{{ $item->category->title ?? '' }}</td>
                            <td><a href="{{url('admin/blog/'.$item->id.'/edit')}}">
                                <strong>{{$item->title}}</strong></a>
                                <br>
                                <span class="text-danger" title="Likes"><i class="fa fa-thumbs-o-up"></i> {{$item->likes}}</span>
                            </td>
                            <td>{{ Str::limit(strip_tags($item->details, 100)) }}</td>
                            <td>{!!Helper::image($item->image,['width'=>80])!!}</td>
                            <td nowrap="">
                                <a href="{{ url('admin/blog_comments?record_id='.$item->id) }}" class="btn btn-info"><i class="fa fa-comment"></i> {{$item->comments_count}}</a>
                                <a href="{{ url('admin/blog/'.$item->id) }}" class="btn btn-success" title="View"><span class="fa fa-eye"/></a>
                                {!!Helper::info($item)!!}
                                {!!Helper::edit_ctrl($item, $model_url)!!}
                                {!!Helper::delete_ctrl($item, $model_url)!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!!$blog->links()!!}
            </div>
        </div>
    </section>
@endsection