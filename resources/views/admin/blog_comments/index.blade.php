@php
    use App\Helper;
    use App\Blog;
@endphp
@extends('admin.layouts.master')
@section('title') Blog Comments - @endsection
@section('content')
    <section class="content-header">
        <h2>Blog Comments</h2>
    </section>
    <div class="card card-light">
        <div class="card-body">
            @if(request()->has('article_id'))
                Comments of article #{{request()->get('article_id')}}, <a href="{{url('admin/blog_comments')}}">Clear</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Approved</th>
                            <th>Blog Article</th>
                            <th>Commenter</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($comments && $comments->count() >0)
                        @foreach($comments as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{!!Helper::sw($item,'active','BlogComment')!!}</td>
                                <td>
                                    @if($item->article)
                                    <a href="{{Blog::url($item->article)}}" target="_blank" title="Open article in new tab">{{$item->article->title}}</a>
                                    @else
                                        <em>Article not found</em>
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{url('admin/blog_comments/'.$item->id)}}"><strong>{{$item->comment}}</strong></a></td>
                                <td>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ url('/admin/blog_comments/' . $item->id) }}" class="btn btn-success btn-sm" title="View Comment"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/blog_comments', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!!Helper::delete_ctrl($item, $model_url)!!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7" class="text-center">No comments found</td>
                    @endif
                    </tbody>
                </table>

                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection