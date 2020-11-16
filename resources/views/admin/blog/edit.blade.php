@extends('admin.layouts.master')
@section('title') Blog | @endsection
@section('content')
    <section class="content-header">
      <h1>Edit: <strong>{{ $article->title }}</strong></h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/blog')}}">Blog</a></li>
        </ol>
    </nav>
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
                    'url' => ['admin/blog', $article->id],
                    'class' => 'form-horizontal article_form',
                    'files' => true
                ]) !!}
                    @include ('admin.blog.form', ['submitButtonText' => 'Save Changes'])
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
