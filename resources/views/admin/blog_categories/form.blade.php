<div class="form-group row {{$errors->has('title')?'has-error':''}}">
    {!! Form::label('title', 'Category name', ['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary btn_loading']) !!}
        <a href="javascript:history.back(1);" class="btn btn-light">Cancel</a>
    </div>
</div>