<script src="{{url('backend/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
	$(function () {
      if($('#editor').length) {
        CKEDITOR.replace('editor', {
          toolbar : 'Full',
          filebrowserUploadUrl: "{{url('admin/settings/upload?responseType=json')}}"
        });
      }
      if($('#editor_ar').length) {
        CKEDITOR.replace('editor_ar', {
          toolbar : 'Full',
          filebrowserUploadUrl: "{{url('admin/settings/upload?responseType=json')}}"
        });
      }
      if($('#editor_en').length) {
        CKEDITOR.replace('editor_en', {
          toolbar : 'Full',
          filebrowserUploadUrl: "{{url('admin/settings/upload?responseType=json')}}"
        });
      }
    });
</script>