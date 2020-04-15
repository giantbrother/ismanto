<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilMrt();
		tampilLrt();
		tampilKci();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilMrt() {
		$.get('<?php echo base_url('Mrt/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-mrt').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-mrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataMrt", function() {
		var id = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrt/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilMrt();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataMrt", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrt/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-mrt').modal('show');
		})
	})

	$('#form-tambah-mrt').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Mrt/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMrt();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-mrt").reset();
				$('#tambah-mrt').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-mrt', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Mrt/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMrt();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-mrt").reset();
				$('#update-mrt').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-mrt').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-mrt').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
		$(document).on("click", ".detail-dataMrt", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrt/detail'); ?>",
			data: "id=" +id
		})
		
		
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-mrt').modal('show');
		})
	})

	

	//Lrt
	function tampilLrt() {
		$.get('<?php echo base_url('Lrt/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-lrt').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-lrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataLrt", function() {
		var id = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrt/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilLrt();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataLrt", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrt/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-lrt').modal('show');
		})
	})

	$(document).on("click", ".detail-dataLrt", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrt/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-lrt').modal('show');
		})
	})

	$('#form-tambah-lrt').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Lrt/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLrt();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-lrt").reset();
				$('#tambah-lrt').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-lrt', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Lrt/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLrt();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-lrt").reset();
				$('#update-lrt').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-lrt').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-lrt').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Kci
	function tampilKci() {
		$.get('<?php echo base_url('Kci/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kci').html(data);
			refresh();
		});
	}

	var id;
	$(document).on("click", ".konfirmasiHapus-kci", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKci", function() {
		var id = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kci/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKci();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKci", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kci/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kci').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKci", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kci/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kci').modal('show');
		})
	})

	$('#form-tambah-kci').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kci/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKci();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kci").reset();
				$('#tambah-kci').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kci', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kci/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKci();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kci").reset();
				$('#update-kci').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kci').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kci').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>