<?php
session_start();
if($_SESSION['username'] && $_SESSION['baris'])
{
    include "koneksi.php";
    $nama_pemesan=$_POST['nama_pemesan'];
    $sql_cari=mysqli_query($konek, "select tbtransaksi.*, tbkamar.tipe_kamar, tbmember.nama
                             from tbtransaksi, tbkamar, tbmember
                              where tbtransaksi.no_transaksi=tbkamar.no_kamar AND
                                    tbtransaksi.no_member=tbmember.no_member AND
                                    tbtransaksi.nama_pemesan LIKE '%$nama_pemesan%'")
?>
<center>
<table border="1" width=10 height=1>
    <tr height=10>
        <td><img src="gambar/gambar1.JPG" height=300 width=700> </td>
</tr>
<tr>
<td> <p align="right"> <a href="logout.php">Logout</a> &nbsp;</p> </td>
</tr>
<tr>
    <td cosplan=2 align="center" bordercolor="silver" bgcolor="grey" valign="top">
    <p>&nbsp;</p>
<form method=post action=cari_nama.php>
<table width="10" border="0" cellspacing="0">
<tr>
    <td width=150>NAMA PEMESAN</td>
    <td> <input type=text name=nama_pemesan size=30 ></td>
    <td><input type=submit name=cari value="CARI"></td>
</tr> 
</table>
</form>
  DAFTAR PEMESANAN HOTEL <br>
  <table border=1>
      <tr> <th>NO</th>
           <th>Nama PEMESANAN</th>
           <th>nama member</th>
           <th>tgl boking</th>
           <th>tgl chekin</th>
           <th>tgl chekout</th>
           <th>tipe kamar</th>
           <th>jumlah kamar</th>
           <th>status</th>
           <th>action</th>
</tr>
<?php             
   $no=1;            
while ($data=mysqli_fetch_array($sql_cari))
{
    echo "<tr>
        <td $no</td>
        <td>$data[nama_pemesan]</td>
        <td>$data[nama]</td>
        <td>$data[tgl_booking]</td>
        <td>$data[checkin]</td>
        <td $data[checkout]</td>
        <td>$data[tipe_kamar]</td>
        <td>$data[jml_pesan]</td>
        <td>$data[status]</td>
        <td> <a href=edit_status.php>edit status </a></td></tr>";
$no=$no+1;
}
echo "</table>";
}
?>