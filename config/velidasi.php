<script type="text/javascript">
	function validasi(form){
	if (form.user.value == ""){
		alert("Anda belum mengisikan Username");
		form.user.focus();
		return (false);
	}
		 
	if (form.pass.value == ""){
		alert("Anda belum mengisikan Password");
		form.pass.focus();
		return (false);
	}
		return (true);
	}
</script>