<div class="white-popup-block">
<legend>أضف قسم جديد</legend>
{!!Form::open(['id'=>'popup_form', 'class'=>'form-horizontal'])!!}	
	<div class="row">
	@foreach($languages as $iso=>$lang)
	    <div class="col-md-6">
	        <div class="form-group {{$errors->has('title_'.$iso)?'has-error':''}}">
	            {!! Form::label('title_'.$iso, 'Name ('.$lang['name'].')', ['class'=>'col-md-3 control-label']) !!}
	            <div class="col-md-9">
	                {!! Form::text('title_'.$iso, null, ['class'=>'form-control f_required']) !!}
	                {!! $errors->first('title_'.$iso, '<p class="help-block">:message</p>') !!}
	            </div>
	        </div>
	    </div>
	@endforeach
	</div>

	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9"> 
			{!!Form::submit('Save', ['class'=>'btn btn-success btn_quickAddCat'])!!}
		</div>
	</div>
{!!Form::close()!!}
</div>