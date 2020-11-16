@extends('admin.layouts.master')
@section('title') Blog Categories - @endsection
@section('content')
    <section class="content-header">
      <h1>Edit: <strong>{{ $record->title }}</strong></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('admin/blog')}}">Blog</a></li>
            <li><a href="{{url('admin/blog_categories')}}">Blog Categories</a></li>
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

                {!! Form::model($record, [
                    'method' => 'PATCH',
                    'url' => ['admin/blog_categories', $record->id],
                    'class' => 'form-horizontal article_form',
                    'files' => true
                ]) !!}
                    @include ('admin.blog_categories.form', ['submitButtonText' => 'حفظ التعديلات'])
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
    </script>
@endsection