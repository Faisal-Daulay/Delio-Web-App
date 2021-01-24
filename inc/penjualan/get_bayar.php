<?PHP
session_start();
include "../../config/koneksi.php";
$total= $_SESSION['total_bayar'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
function kembali()
{
	var total=document.getElementById('total').value;
	var bayar=document.getElementById('bayar').value;
	document.getElementById('kembalian').value=bayar-total;
}

function pertama()
{
	document.getElementById("bayar").focus();
  	var kasir=opener.document.getElementById('kasir').value;
	var faktur=opener.document.getElementById('faktur').value;
	var tgl_jual=opener.document.getElementById('tgl_jual').value;	
	document.getElementById('kasir').value=kasir;
	document.getElementById('faktur').value=faktur;
	document.getElementById('tgl_jual').value=tgl_jual;
}
</script>
<style>
input{
	height:35px;
	font-size:36px;
}

#ok{
	font-size:26px;
}
</style>
</head>

<body onload="pertama()">
<form action="get_bayar_proses.php">
<input type="hidden" name="tgl_jual" id="tgl_jual" />
<table>

	<tr>
    	<td>Status Pembayaran</td>
        <td>:</td>
        <td align="right">
		<select name="statusbayar" style="width: 395px;">
        <option value="Sudah Bayar">Sudah Bayar</option>		
		<option value="Belum Bayar">Belum Bayar</option>
		
		</select>
		</td>
    </tr>
    <tr>
        <td>Pembayaran Via</td>
        <td>:</td>
        <td align="right">
        <select name="viabayar" style="width: 395px;">
        <option value="Mandiri">Mandiri</option>      
        <option value="BCA">BCA</option>
        
        </select>
        </td>
    </tr>
    <tr>
        <td>Closing Via</td>
        <td>:</td>
        <td align="right">
        <select name="closing" style="width: 395px;">
        <option value="BBM">BBM</option>      
        <option value="SMS">SMS</option>
        
        </select>
        </td>
    </tr>
	
	
	<tr>
    	<td>Total</td>
        <td>:</td>
        <td><input type="hidden" name="total" id="total" value="<?php echo $total?>"/>
        	<input type="text" value="<?php echo "Rp. ".number_format($total, 0 , ',' , '.' );?>"/>
        </td>
    </tr>
    <tr>
    	<td>Bayar</td>
        <td>:</td>
        <td><input type="text" name="bayar" id="bayar" onkeyup="kembali()" autocomplete="off"/></td>
    </tr>
    <tr>
    	<td>Kembalian</td>
        <td>:</td>
        <td><input type="text" name="kembalian" id="kembalian"/></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td><input type="submit" name="ok" value="Ok" id="ok"/></td>
    </tr>
</table>
</form>
</body>
</html>