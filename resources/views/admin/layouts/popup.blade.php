{!!HTML::style('backend/popup/magnific-popup.css')!!}
{!!HTML::script('backend/popup/magnific-popup.min.js')!!}
<script type="text/javascript">
	$(document).ready(function() {
	  $('.popup').magnificPopup({type:'ajax'});
	  $('.popup_if').magnificPopup({type:'iframe'});
	});
</script>