$(document).ready(function() {

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		$('#pembungkus').load('ajax/anggota.php?keyword=' + $('#keyword').val());
	});

});