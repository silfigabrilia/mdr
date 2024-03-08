<?php 
include("koneksi.php");
$barang = $_POST['id_barang'];
$tampil=mysqli_query($koneksi,"SELECT * FROM barang WHERE detail_barang='$barang'");
$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
    while($d=mysqli_fetch_array($tampil)){
        ?>
        <option value="<?php echo $d['id_detail_barang'] ?>"><?php echo $d['serial_code'] ?></option>
        <?php        
    }
}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
 
?>