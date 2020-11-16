<div class="white-popup-block">
<legend>Add category</legend>
{!!Form::open(['id'=>'popup_form', 'class'=>'form-horizontal'])!!}
	<div class="form-group row">
		{!!Form::label('title', 'Category name *', ['class'=>'control-label col-md-3'])!!}
		<div class="col-md-9">
			{!!Form::text('title', null, ['class'=>'form-control f_required', 'required'=>'required'])!!}
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-3"></div>
		<div class="col-md-9"> 
			{!!Form::submit('Submit', ['class'=>'btn btn-success btn_quickAddCat'])!!}
		</div>
	</div>
{!!Form::close()!!}
</div>