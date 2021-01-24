<?php error_reporting(0); ?><style type="text/css">
	#table_buku table{
		border:1px solid #000000;
	}
	#table_buku th{
		background-color:#43609C;
		color:#FFFFFF;
	}
	#table_buku tr:hover{
		background-color:#CCCCCC;
	}
	#table_buku a{
	text-decoration:none;
	}
	
	.submit{
		background:#43609C;
		border:none;
		padding:3px 5px;
		color: #fff;
		font-family: "Times New Roman", Times, serif;
		font-style:italic;
	}
</style>

<script language="javascript">
function tambah(nama,harga)
{
	
   
	opener.document.getElementById('nama').value=nama;
	opener.document.getElementById('harga').value=harga;
    self.close();
}
</script>

<h4>Cari</h4>
<form method="get" action="get_resto.php">
        <label>kode atau judul
          <input type="text" class="fields_contact_us" name="search" />
          <input type="submit" value="Cari" class="submit"/>
        </label>
</form>
<h3>Daftar Product</h3	>
<div id="table_buku">	
<?php
	
$hostname="localhost";
$username="root";
$pass="";

$config=mysql_connect($hostname,$username,$pass) or die ("mysql_error()");

mysql_select_db('delio');
	
	$file = "?psg=get_resto";
	$page = "?psg=get_resto";
	// Memanggil dan menginisiasi class
	include "class_paging.php";
	$p = new Paging;
	
	// Tentukan limit atau batas
	$batas = 50;
	
	// Cek halaman dan posisi data
	$posisi = $p->cariPosisi($batas);
	
	$warna1 = "#FFFFFF"; //baris ganjil
	$warna2 = "#F5F5F5"; //baris genap
	$warna = $warna1; //warna default
	
?>
	<table cellpadding="4" width=600px border=1>
    	<tr>
        	<th>No</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Option</th>
        </tr>
<?php
	$no=$posisi+1;
	$search=$_REQUEST['search'];
	
	$query="SELECT * FROM produk";
	
	if($search!='')
	{
		$sql = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%' ORDER BY nama_produk ASC LIMIT $posisi,$batas") or die (mysql_error());
		$sql2 = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%' ORDER BY nama_produk ASC");
	}
	else
	{
		$sql = mysql_query("SELECT * FROM produk ORDER BY nama_produk ASC LIMIT $posisi,$batas") or die (mysql_error());
		$sql2 = mysql_query("SELECT * FROM produk ORDER BY nama_produk ASC");
	}
	while($row=mysql_fetch_array($sql))
	{
		if($no%2==0)
			$warna=$warna2;
		else
			$warna=$warna1;
	
		//mencari sisa
		$id=$row['id_produk'];
		$nama=$row['nama_produk'];
		$harga=$row['harga_saller'];
//$hargas=$row['harga_saller'];
		
		$nama=str_replace("'"," ", $nama);
		
		if()
{
		?>
		<tr bgcolor="<?php echo $warna ?>">
			<td><?php echo $no?></td>
			<td><?php echo $nama ?></td>
			<td><?php echo $harga ?></td>
			<td><a href="javascript:tambah(<?php echo "'$nama','$harga'"?>)">Tambah</a></td>
		</tr>
		<?php
		$no++;
	}
?>
	</table>
<?php
	// Dapatkan jumlah data keseluruhan
	$jmldata = mysql_num_rows($sql2);
	
	// Dapatkan jumlah halaman
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	
	// Cetak link navigasi halaman
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman, $page);
	echo $linkHalaman;
?>
</div>
          