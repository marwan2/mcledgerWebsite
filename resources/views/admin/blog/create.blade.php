@extends('admin.layouts.master')
@section('title') Add new article - Blog - @endsection
@section('content')
<section class="content-header">
    <h1>Add New Article</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/blog')}}">Blog</a></li>
        </ol>
    </nav>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::open(['url'=>'admin/blog', 'class'=>'form-horizontal page_form', 'files'=>true]) !!}
                @include ('admin.blog.form')
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
