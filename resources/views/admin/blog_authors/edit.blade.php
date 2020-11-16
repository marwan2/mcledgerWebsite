@extends('admin.layouts.master')
@section('title') Blog Authors - @endsection
@section('content')
    <section class="content-header">
      <h1>Edit author: <strong>{{ $article->name }}</strong></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('admin/blog')}}">Blog</a></li>
            <li><a href="{{url('admin/blog_authors')}}">Blog Authors</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header with-border"></div>
            <div class="card-body">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::model($article, [
                    'method' => 'PATCH',
                    'url' => ['admin/blog_authors', $article->id],
                    'class' => 'form-horizontal article_form',
                    'files' => true
                ]) !!}
                    @include ('admin.blog_authors.form', ['submitButtonText' => 'Save Changes'])
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection