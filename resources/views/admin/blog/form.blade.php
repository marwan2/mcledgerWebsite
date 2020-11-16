<div class="form-group row {{ $errors->has('category_id')?'has-error':''}}">
    {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-5 form-inline">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2">
        <a href="{{url('admin/quickadd/blog/category')}}" class="popup btn btn-light">+</a>
    </div>
</div>

<div class="form-group row {{ $errors->has('author_id')?'has-error':''}}">
    {!! Form::label('author_id', 'Author', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-5 form-inline">
        {!! Form::select('author_id', $authors, null, ['class' => 'form-control']) !!}
        {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-2">
        <a href="{{url('admin/quickadd/blog/author')}}" class="popup btn btn-light">+</a>
    </div>
</div>

<div class="form-group row {{$errors->has('title')?'has-error':''}}">
    {!! Form::label('title', 'Article Title', ['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('title', null, ['class'=>'form-control form-control-lg']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{$errors->has('details')?'has-error':''}}">
    {!! Form::label('details', 'Body', ['class'=>' col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('details', null,['class'=>'form-control','id'=>'editor']) !!}
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="image">
    {!!App\Helper::image_field('image', @$article)!!}
</div>

<div class="form-group row {{ $errors->has('tags')?'has-error':''}}">
    {!! Form::label('tags', 'Tags', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9 form-inline">
        {!! Form::text('tags', null, ['class' => 'form-control tags']) !!}
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('meta_keywords')?'has-error':''}}">
    {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
        {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{$errors->has('meta_desc')?'has-error':''}}">
    {!! Form::label('meta_desc', 'Meta Description', ['class'=>' col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('meta_desc', null,['class'=>'form-control', 'rows'=>4, 'placeholder'=>'Enter your meta description here']) !!}
        {!! $errors->first('meta_desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{$errors->has('active')?'has-error':''}}">
    {!! Form::label('active', 'Active', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <div class="checkbox">
            <label>{!! Form::radio('active', '1', null) !!} Yes</label>
            <label>{!! Form::radio('active', '0', null) !!} No</label>
        </div>
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row">
    <div class="offset-md-3 col-md-3">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText:'Submit', ['class'=>'btn btn-primary btn_loading']) !!}
        <a href="javascript:history.back(1);" class="btn btn-light">Cancel</a>
    </div>
</div>

@section('script')
    @include('admin.layouts.popup')
    @include('admin.layouts.ckeditor')
    {!!HTML::style('backend/vendor/tags/jquery.tagsinput.min.css')!!}
    {!!HTML::script('backend/vendor/tags/jquery.tagsinput.min.js')!!}    
    <script type="text/javascript">
        $('.tags').tagsInput({
            'width':'100%',
            'height':'80px',
            'defaultText':'Write tag then press Enter',
        });
        $(document).on('click','.btn_quickAddAuthor', function(event) {
            event.preventDefault();
            var $btn  = $(this);
            if($("#popup_form").find('.f_required').val()=='') {
                alert('Please fill in all required fields');
                return false;
            }
            $.ajax({
                url: '{{url("admin/blog_authors")}}',
                data: $("#popup_form").serializeArray(),
                type:'POST',
                dataType:'json',
                beforeSend: function() {
                    $btn.button('loading');
                }
            }).done(function(output) {
                if (output.status == 'success') {
                    var indata = output.data;
                    $("#author_id").append('<option value="'+indata.id+'" selected="selected">'+indata.name+'</option>');
                    $.magnificPopup.close();
                } else {
                    alert('Error occured');
                }
            }).fail(function() {
                alert('Error');
            }).always(function() {
                $btn.button('reset');
            });
        });
        $(document).on('click','.btn_quickAddCat', function(event) {
            event.preventDefault();
            var $btn  = $(this);
            if($("#popup_form").find('.f_required').val()=='') {
                alert('Please fill in all required fields');
                return false;
            }
            $.ajax({
                url: '{{url("admin/blog_categories")}}',
                data: $("#popup_form").serializeArray(),
                type:'POST',
                dataType:'json',
                beforeSend: function() {
                    $btn.button('loading');
                }
            }).done(function(output) {
                if (output.status == 'success') {
                    var indata = output.data;
                    $("#category_id").append('<option value="'+indata.id+'" selected="selected">'+indata.title+'</option>');
                    $.magnificPopup.close();
                } else {
                    alert('Error occured');
                }
            }).fail(function() {
                alert('Error');
            }).always(function() {
                $btn.button('reset');
            });
        });
    </script>
@endsection