@if(session()->has('flash_message'))
<div class="container clearfix blog_flash_msgs" style="clear: both;">
	<div class="row">
		<div class="col-md-12 ">
		    <div class="mt-2 mb-2 alert alert-{{session()->get('type', 'warning')}}">
		        {{session()->get('flash_message')}}
		    </div>
		</div>
	</div>
</div>
@endif