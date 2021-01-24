<?php
    include '../../config/koneksi.php';

    $start1=date('Y-m-d',strtotime($_REQUEST['start']));
    
    list($years, $months, $days) = split('-', $start1);
    $tgls=$days."-".$months."-".$years;

    $query = mysql_query("SELECT * FROM orderan o LEFT JOIN penjualan pe ON pe.invoice=o.invoice
        INNER JOIN produk p ON pe.id_produk = p.id_produk
        INNER JOIN kat_produk k ON p.id_k_pr = k.id_k_pr
        INNER JOIN customer c ON o.id_customer = c.id_customer
        INNER JOIN kabupaten kab ON c.Id_kabupaten = kab.Id_kabupaten
        INNER JOIN order_bonus ob ON o.invoice = ob.invoice 
        iNNER JOIN bonus bon ON ob.id_bonus = bon.id_bonus 
        WHERE tgl_jual='$start1' ");
    $semuadata = '';
    while($cek=mysql_fetch_array($query)){
    
        $invo=$cek['invoice'];
        $tt=$cek['tgl_jual'];
        $nama=$cek['nama'];
        $namatuju=$cek['alamat_tujuan'];
        $kode=$cek['kode_pos'];
        $produk=$cek['nama_produk'];
        $jumpro=$cek['jumlah'];
        $kabupaten=$cek['nama_kabkot'];
        $namabon=$cek['nama_bonus'];
        $jumbonus=$cek['jumlah'];
        $namabon=$cek['nama_bonus'];
        $notel=$cek['no_tlpn'];

        list($year, $month, $day) = split('-', $tt);
        $tgl=$day."-".$month."-".$year;
        
        $txt = "$invo# ";
        $semuadata .= $txt;
        $txt = "$tgl# ";
        $semuadata .= $txt;
        $txt = "$nama# ";
        $semuadata .= $txt;
        $txt = "$namatuju# ";
        $semuadata .= $txt;
        $txt = "$notel# ";
        $semuadata .= $txt;
        $txt = "$kabupaten# ";
        $semuadata .= $txt;
        $txt = "$kode# ";
        $semuadata .= $txt;
        $txt = "$produk# ";
        $semuadata .= $txt;
        $txt = "$jumpro# ";
        $semuadata .= $txt;
        $txt = "$namabon#\n\n --> ";
        $semuadata .= $txt;
        
        $fh = fopen($tgl .'.txt', 'w'); 
        fwrite($fh, $semuadata);
        fclose($fh);
    }
    header("location: ../../?psg=export/export");
?>