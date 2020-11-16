<div class="form-group row {{$errors->has('name')?'has-error':''}}">
    {!! Form::label('name', 'Author name', ['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{$errors->has('details')?'has-error':''}}">
    {!! Form::label('details', 'Brief', ['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('details', null,['class'=>'form-control','id'=>'editor_en']) !!}
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="image">
    {!!App\Helper::image_field('image', @$article)!!}
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
        <a href="javascript:history.back(1);" class="btn btn-light">Cancel</a>
    </div>
</div>