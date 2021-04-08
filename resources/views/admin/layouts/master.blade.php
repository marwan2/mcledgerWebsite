@php
	use App\Helper;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title') - {{ config('app.name', 'Admin') }}</title>
  <link href="{{url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('backend/css/style.css')}}" rel="stylesheet">
  @yield('styles')
  <script type="text/javascript">
    var csrf_token = '{{csrf_token()}}';
    var $no_thumb_url = '{{url('img/no_image.png')}}';
    var $show_user_assign_div = false;
  </script>
</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin')}}">
        <div class="sidebar-brand-icon">
         	<img src="{{url('img/logo.png')}}" class="logo_img w-100 mw-100" alt="{{ config('app.name') }}">
        </div>
      </a>
      	@foreach(App\Settings::$menu as $model=>$label)
  	      <li class="nav-item {!!Helper::activeURL($model)!!}">
  	        <a class="nav-link {!!Helper::activeURL($model)!!}" href="{{url('admin/'.$model)}}">
  	          <i class="fas fa-fw fa-tachometer-alt"></i> <span>{{$label}}</span>
              @if(isset($stats[$model]))
                <span class="badge badge-info">{{$stats[$model]}}</span>
              @endif
  	        </a>
  	      </li>
	      @endforeach
	      <hr class="sidebar-divider d-none d-md-block">
	      <div class="text-center d-none d-md-inline">
	        <button class="rounded-circle border-0" id="sidebarToggle"></button>
	      </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow toggled">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{-- 3+ --}}</span>
              </a>
              <div class="dropdown-list dropdown-menu shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">@lang('site.all_notific')</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}" target="_blank">Goto Website</a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown mr-auto no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Welcome, {{ Auth::user()->name }} </span>
                  @if(auth()->user()->image)
                    {{Helper::image2(auth()->user()->image, ['class'=>'img-profile rounded-circle'])}}
                  @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    @if(auth()->user()->role == 'admin')
                    	<a class="dropdown-item" href="{{ url('admin/users') }}">
                    		<i class="fas fa-user fa-sm fa-fw ml-2 text-gray-400"></i>@lang('site.accounts')
                    	</a>
                    @endif
                	<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw ml-2 text-gray-400"></i> @lang('site.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">
			      @if(Session::has('flash_message'))
			          <div class="mb-2 mt-2 alert alert-{{Session::get('alert','success')}}">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            {!!Session::get('flash_message')!!}
			          </div>
			      @endif
			    </div>
			</div>
          	@yield('content')
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; {{date('Y')}} - {{ config('app.name', 'Admin') }}</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script src="{{url('backend/js/popper.min.js')}}"></script>
<script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('backend/js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript">
	$(document).on('click', '.btn_boolean', function(event) {
        event.preventDefault();
        if(window.confirm('Change record status?'))
        {
          $id = $(this).data('id');
          $field = $(this).data('field');
          $model = $(this).data('model');
          $element = $('.elem'+$field+$id);
          $.ajax({
              url: '{{url('admin/settings/switch-boolean')}}',
              type: 'GET',
              data: {id: $id, model: $model, field: $field},
              beforeSend:function() {
                  $element.html('loading');
              }
          }).done(function(response) {
              $res = $.parseJSON(response);
              $elem_wrapper = $element.parent('td');
              $element.remove();
              if($res.status==1) {
              		let $color = 'danger';
              		let $txt = 'No';
                  	let $icon = 'minus-circle';

              	if($res.newval==1) {
                    	$color = 'success';
                    	$txt = 'Yes';
                    	$icon = 'check-circle';
                  	}

	                $icon_text = '<i class="fa fa-2x fa-'+$icon+'"></i>';
	                $icon_text = $txt;

                  	$elem_wrapper.html('<a href="#" class="btn rounded-lg btn-sm text-'+$color+' btn_boolean elem'+$field+$id+'" data-id="'+$id+'" data-model="'+$model+'" data-field="'+$field+'"><i class="fa fa-2x fa-'+$icon+'"></a>');
              } else {
                  alert('خطا حدث في تغيير التفعيل');
              }
          }).fail(function() {
              console.log("خطا حدث في تغيير التفعيل");
          }).always(function() {
          });
        }
    });

    $(document).on('change', '.form-filter select', function(event) {
      event.preventDefault();
      $('.form-filter').submit();
    });

    $(document).on('click', '.btn_loading', function () {
        var $btn = $(this).button('loading');
        $(this).parent('div').append(`<div class="spinner-border" role="status">
		  <span class="sr-only">Loading...</span>
		</div>`);
    });

    $(document).ready(function() {
    	if($('.dataTable').length > 0) {
	    	$(".dataTable").DataTable({
		        "order": [[ 0, "desc" ]],
            @if(app()->isLocale('ar'))
  		        "language": {
  		          "sProcessing":   "جارٍ التحميل...",
  		          "sLengthMenu":   "أظهر _MENU_ مدخلات",
  		          "sZeroRecords":  "لم يعثر على أية سجلات",
  		          "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
  		          "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
  		          "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
  		          "sInfoPostFix":  "",
  		          "sSearch":       "ابحث:",
  		          "sUrl":          "",
  		          "oPaginate": {
  		              "sFirst":    "الأول",
  		              "sPrevious": "السابق",
  		              "sNext":     "التالي",
  		              "sLast":     "الأخير"
  		          }
  		        }
            @endif
		      });
    	}

      if($('.select2').length > 0) {
        $('.select2').select2({
          theme: "classic"
        });
      }
	});
	$('.btn_changepass').on('click', function(event) {
        event.preventDefault();
        $("#ChangePassModal #ch_user_id").val($(this).data('id'));
    });
    function readURL(input, fID) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('.img_preview.imgfield'+fID).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('change', '.img_browse', function(){
        let fid = $(this).data('fid');

        let filename = this.files[0].name;
        let ext = filename.split('.').pop();

        if($.inArray(ext, ['png','jpg','gif','bmp','jpeg','tif']) !== -1) {
        	readURL(this, fid); return false;
        }
        return false;
    });

    function delete_img($obj, $model, $field) {
      var $id = $obj.data('id');

      if(window.confirm('حذف الملف: هل أنت متأكد؟')) {
          $.ajax({
              url: '{{url('admin/settings/deleteimage')}}?id='+$id+'&model='+$model+'&field='+$field,
              type: 'POST',
              data: {_token: csrf_token},
              beforeSend:function() {
                  $obj.append('<span class="del_load">جاري الحذف...</span>');
              }
          }).done(function(response) {
              output = jQuery.parseJSON(response);
              if(output.status=='success') {
                  $obj.parent().parent().parent('.infile').slideUp('400');
              } else {
                  alert('Error deleting file');
              }
          }).fail(function(err) {
            let e_msg = (err.responseText.message !== undefined) ? err.responseText.message:'';
              alert("Error, " + e_msg);
          }).always(function() {
              $obj.find('.del_load').remove();
          });
      }
    }

    $(function () {
      $('[data-toggle="popover"]').popover()
    });
</script>
@yield('script')
</body></html>