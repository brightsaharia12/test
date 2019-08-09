
$(document).ready(function() {
	$('.datatable').DataTable();

	$(document).on('click', '.jsDelete', function() {
		if(confirm('Are you sure to delete?')) {
			$(this).closest('td').find('form').submit();
		}
	})
});