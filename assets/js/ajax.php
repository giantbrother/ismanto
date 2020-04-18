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
		tampilMrtpnp();
<<<<<<< HEAD
		tampilLrtpnp();
		tampilKcipnp();
		tampilRailinkpnp();
		tampilTransjakarta();
		tampilTransjakartapnp();
		tampilPeraturan();
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
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
<<<<<<< HEAD
	
	//MRT
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

	function tampilMrt() {
		$.get('<?php echo base_url('Mrt/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-mrt').html(data);
			refresh();
		});
	}

<<<<<<< HEAD
	var idnye;
	$(document).on("click", ".konfirmasiHapus-mrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datamrt", function() {
		var idnye = id;
=======
	var id;
	$(document).on("click", ".konfirmasiHapus-mrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataMrt", function() {
		var id = id;
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		
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
<<<<<<< HEAD
				
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
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
<<<<<<< HEAD
	
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	function tampilLrt() {
		$.get('<?php echo base_url('Lrt/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-lrt').html(data);
			refresh();
		});
	}

<<<<<<< HEAD
	var idnye;
	$(document).on("click", ".konfirmasiHapus-lrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datalrt", function() {
		var idnye = id;
=======
	var id;
	$(document).on("click", ".konfirmasiHapus-lrt", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataLrt", function() {
		var id = id;
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		
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

<<<<<<< HEAD
	var idnye;
	$(document).on("click", ".konfirmasiHapus-kci", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datakci", function() {
		var idnye = id;
=======
	var id;
	$(document).on("click", ".konfirmasiHapus-kci", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKci", function() {
		var id = id;
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		
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
<<<<<<< HEAD
				
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
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
<<<<<<< HEAD
	
	
	//Railink
	function tampilRailink() {
		$.get('<?php echo base_url('Railink/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-railink').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-railink", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datarailink", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railink/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilRailink();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataRailink", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railink/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-railink').modal('show');
		})
	})

	$(document).on("click", ".detail-dataRailink", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railink/detail'); ?>",
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
			$('#detail-railink').modal('show');
		})
	})

	$('#form-tambah-railink').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Railink/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilRailink();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-railink").reset();
				$('#tambah-railink').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-railink', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Railink/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilRailink();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-railink").reset();
				$('#update-railink').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-railink').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-railink').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
	//Transjakarta
	function tampilTransjakarta() {
		$.get('<?php echo base_url('Transjakarta/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-transjakarta').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-transjakarta", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datatransjakarta", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakarta/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTransjakarta();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTransjakarta", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakarta/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-transjakarta').modal('show');
		})
	})

	$(document).on("click", ".detail-dataTransjakarta", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakarta/detail'); ?>",
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
			$('#detail-transjakarta').modal('show');
		})
	})

	$('#form-tambah-transjakarta').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transjakarta/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransjakarta();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-transjakarta").reset();
				$('#tambah-transjakarta').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-transjakarta', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transjakarta/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransjakarta();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-transjakarta").reset();
				$('#update-transjakarta').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-transjakarta').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-transjakarta').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e


	//MRT PNP


	function tampilMrtpnp() {
		$.get('<?php echo base_url('Mrtpnp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-mrtpnp').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-mrtpnp", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datamrtpnp", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrtpnp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilMrtpnp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataMrtpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrtpnp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-mrtpnp').modal('show');
		})
	})

	$(document).on("click", ".detail-dataMrtpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Mrtpnp/detail'); ?>",
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
			$('#detail-mrtpnp').modal('show');
		})
	})

	$('#form-tambah-mrtpnp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Mrtpnp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMrtpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-mrtpnp").reset();
				$('#tambah-mrtpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
<<<<<<< HEAD
				window.setTimeout(function(){window.location.reload()},3000);
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-mrtpnp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Mrtpnp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMrtpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-mrtpnp").reset();
				$('#update-mrtpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-mrtpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-mrtpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
<<<<<<< HEAD
	
		//LRT PNP

	function tampilLrtpnp() {
		$.get('<?php echo base_url('Lrtpnp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-lrtpnp').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-lrtpnp", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datalrtpnp", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrtpnp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilLrtpnp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataLrtpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrtpnp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-lrtpnp').modal('show');
		})
	})

	$(document).on("click", ".detail-dataLrtpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Lrtpnp/detail'); ?>",
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
			$('#detail-lrtpnp').modal('show');
		})
	})

	$('#form-tambah-lrtpnp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Lrtpnp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLrtpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-lrtpnp").reset();
				$('#tambah-lrtpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()},3000);
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-lrtpnp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Lrtpnp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLrtpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-lrtpnp").reset();
				$('#update-lrtpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-lrtpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-lrtpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	//KCI PNP

	function tampilKcipnp() {
		$.get('<?php echo base_url('Kcipnp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kcipnp').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-kcipnp", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datakcipnp", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kcipnp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKcipnp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKcipnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kcipnp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kcipnp').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKcipnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kcipnp/detail'); ?>",
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
			$('#detail-kcipnp').modal('show');
		})
	})

	$('#form-tambah-kcipnp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kcipnp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKcipnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kcipnp").reset();
				$('#tambah-kcipnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()},3000);
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kcipnp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kcipnp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKcipnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kcipnp").reset();
				$('#update-kcipnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kcipnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kcipnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
		//Railink PNP

	function tampilRailinkpnp() {
		$.get('<?php echo base_url('Railinkpnp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-railinkpnp').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-railinkpnp", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datarailinkpnp", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railinkpnp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilRailinkpnp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataRailinkpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railinkpnp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-railinkpnp').modal('show');
		})
	})

	$(document).on("click", ".detail-dataRailinkpnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Railinkpnp/detail'); ?>",
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
			$('#detail-railinkpnp').modal('show');
		})
	})

	$('#form-tambah-railinkpnp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Railinkpnp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilRailinkpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-railinkpnp").reset();
				$('#tambah-railinkpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()},3000);
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-railinkpnp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Railinkpnp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilRailinkpnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-railinkpnp").reset();
				$('#update-railinkpnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-railinkpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-railinkpnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
		//Transjakarta PNP

	function tampilTransjakartapnp() {
		$.get('<?php echo base_url('Transjakartapnp/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-transjakartapnp').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-transjakartapnp", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-datatransjakartapnp", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakartapnp/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTransjakartapnp();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTransjakartapnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakartapnp/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-transjakartapnp').modal('show');
		})
	})

	$(document).on("click", ".detail-dataTransjakartapnp", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Transjakartapnp/detail'); ?>",
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
			$('#detail-transjakartapnp').modal('show');
		})
	})

	$('#form-tambah-transjakartapnp').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transjakartapnp/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransjakartapnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-transjakartapnp").reset();
				$('#tambah-transjakartapnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()},3000);
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-transjakartapnp', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Transjakartapnp/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTransjakartapnp();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-transjakartapnp").reset();
				$('#update-transjakartapnp').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-transjakartapnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-transjakartapnp').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	//Peraturan

	function tampilPeraturan() {
		$.get('<?php echo base_url('Peraturan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-peraturan').html(data);
			refresh();
		});
	}

	var idnye;
	$(document).on("click", ".konfirmasiHapus-peraturan", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataperaturan", function() {
		var idnye = id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Peraturan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPeraturan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPeraturan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Peraturan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-peraturan').modal('show');
		})
	})

	$('#form-tambah-peraturan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Peraturan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPeraturan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-peraturan").reset();
				$('#tambah-peraturan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.setTimeout(function(){window.location.reload()},1000);
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-peraturan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Peraturan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPeraturan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-peraturan").reset();
				$('#update-peraturan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-Peraturan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-Peraturan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	
		$(document).on("click", ".detail-dataPeraturan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Peraturan/detail'); ?>",
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
			$('#detail-peraturan').modal('show');
		})
	})
	
	

	
	
	
	
	
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
</script>