<?php error_reporting(0); ?><style type="text/css">
	#table_buku table{
		border:1px solid #000000;
	}
	#table_buku th{
		background-color:#926B4A;
		color:#FFFFFF;
	}
	#table_buku tr:hover{
		background-color:#CCCCCC;
	}
	#table_buku a{
	text-decoration:none;
	}
	
	.submit{
		background:#926B4A;
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
<form name="search_siswa_form" method="get" action="get_resto.php">
        <label>kode atau judul
          <input type="text" class="fields_contact_us" name="search" /><input type="submit" value="Cari" class="submit"/>
        </label>
</form>
<h3>Daftar Makanan</h3	>
<div id="table_buku">	
<?php
	include "../../config.php";
	
	$file = "index.php?p=get_resto.php";
	$page = "p=get_resto.php";
	// Memanggil dan menginisiasi class
	include "class_paging.php";
	$p = new Paging;
	
	// Tentukan limit atau batas
	$batas = 50;
	
	// Cek halaman dan posisi data
	$posisi = $p->cariPosisi($batas);
	
	$warna1 = "#D9B583"; //baris ganjil
	$warna2 = "#B78E5A"; //baris genap
	$warna = $warna1; //warna default
	
?>
	<table cellpadding="4">
    	<tr>
        	<th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Option</th>
        </tr>
<?php
	$no=$posisi+1;
	$search=$_REQUEST['search'];
	
	$query="SELECT * FROM makanan";
	
	if($search!='')
	{
		$sql = mysql_query("$query WHERE nama LIKE '%$search%' ORDER BY nama ASC LIMIT $posisi,$batas") or die (mysql_error());
		$sql2 = mysql_query("$query WHERE nama LIKE '%$search%' ORDER BY nama ASC");
	}
	else
	{
		$sql = mysql_query("$query ORDER BY nama ASC LIMIT $posisi,$batas", $koneksi) or die (mysql_error());
		$sql2 = mysql_query("$query ORDER BY nama ASC");
	}
	while($row=mysql_fetch_array($sql))
	{
		if($no%2==0)
			$warna=$warna2;
		else
			$warna=$warna1;
	
		//mencari sisa
		$id=$row['id_makanan'];
		$nama=$row['nama'];
		$harga=$row['harga'];
		
		$nama=str_replace("'"," ", $nama);
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
          