<?php
	session_start();
	
	$total= $_SESSION['total_bayar'];
	
	
	$bayar=$_REQUEST['bayar'];
	$kembalian=$_REQUEST['kembalian'];
		$kamar=$_REQUEST['kamar'];
	$meja=$_REQUEST['meja'];
	
	$_SESSION['bayar']=$bayar;
	$_SESSION['kembalian']=$kembalian;
	
	$total="Rp. ".number_format($total, 0 , ',' , '.' );
	$bayar="Rp. ".number_format($bayar, 0 , ',' , '.' );
	$kembalian="Rp. ".number_format($kembalian, 0 , ',' , '.' );
?>
<script>
window.onload=function()
{
	document.getElementById("tombol").focus();
};
</script>
<style>
table{
	font-size:36px;
}
input{
	height:35px;
	font-size:36px;
}

#tombol{
	font-size:26px;
}
</style>
<form action="resto_proses.php">
<table>

	<tr>
    	<td>Kamar</td>
        <td>:</td>
        <td align="right"><?php echo $kamar?></td>
    </tr>
	
	<tr>
    	<td>Meja</td>
        <td>:</td>
        <td align="right"><?php echo $meja?></td>
    </tr>
	<tr>
    	<td>Total</td>
        <td>:</td>
        <td align="right"><?php echo $total?></td>
    </tr>
    <tr>
    	<td>Bayar</td>
        <td>:</td>
        <td align="right"><?php echo $bayar?></td>
    </tr>
    <tr>
    	<td>Kembalian</td>
        <td>:</td>
        <td align="right"><?php echo $kembalian?></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><input type="submit" name="tombol" value="Bayar" id="tombol"/></td>
    </tr>
</table>
</form>