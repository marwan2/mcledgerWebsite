<div class="white-popup-block">
<legend>Add author</legend>
{!!Form::open(['id'=>'popup_form', 'class'=>'form-horizontal'])!!}	
	<div class="row">
	    <div class="col-md-6">
	        <div class="form-group {{$errors->has('name')?'has-error':''}}">
	            {!! Form::label('name', 'Author name', ['class'=>'col-md-3 control-label']) !!}
	            <div class="col-md-9">
	                {!! Form::text('name', null, ['class'=>'form-control']) !!}
	                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	            </div>
	        </div>
	    </div>
	</div>

	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9"> 
			{!!Form::submit('Save', ['class'=>'btn btn-success btn_quickAddAuthor'])!!}
		</div>
	</div>
{!!Form::close()!!}
</div>