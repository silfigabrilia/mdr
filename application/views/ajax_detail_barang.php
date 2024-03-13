
<?php 
include("koneksi.php");
$barang = $_POST['id_barang'];
$tampil=mysqli_query($koneksi,"SELECT * FROM detail_barang WHERE id_detail_barang='$barang'");
$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
    while($r=mysqli_fetch_array($tampil)){
        ?>
        <option value="<?php echo $r['nama_barang'] ?>"><?php echo $r['serial_code'] ?></option>
        <?php        
    }
}else{
    echo "<option selected>- Item Detail Tidak Ditemukan -</option>";
}
 
?>