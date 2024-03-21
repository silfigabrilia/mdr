<?php include 'Koneksi.php' ?>
<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Data Detail Replace
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Detail_Replace/proses_edit_detail')?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_replace" class="form-label">Nama Barang Replace</label>
                        <input type="text" class="form-control" name="nama_replace" id="nama" placeholder="Masukkan Nama..."value="<?= $Detail_Replace['nama_replace'] ?>">
                        <input type="hidden" name="id_detail_replace" id="id_detail_replace" value="<?= $Detail_Replace['id_detail_replace'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jml_replace" id="jml_replace" placeholder="Masukkan Jumlah..."value="<?= $Detail_Replace['jml_replace'] ?>">
                    </div>
                </div>
				<div class="col-md-6">
                        <div class="mb-3">
                            <label  class="form-label">ID Barang</label>
                        <div class="input-group">
                            <select class="form-control" name="id_barang" id="getIdBarang" required>
                                <option value="" >Pilih Barang</option>
                                <?php 
							//foreach ($barang as $data) { 
							$itembarang = mysqli_query($koneksi,"select * from barang");
							while($b = mysqli_fetch_array($itembarang)){
								?>
                                    <option value="<?= $b['id_barang'] ?>"<?= $b['id_barang'] == $Detail_Replace['id_barang'] ? "selected":""?>><?= $b['nama_barang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_replace" class="form-label">Tanggal Replace</label>
                        <input type="date" class="form-control" name="tgl_replace" id="tgl_replace"value="<?= $Detail_Replace['tgl_replace'] ?>">
                    </div>
                    </div>
				<div class="col-md-6">
                        <div class="mb-3">
                            <label for="serial_code" class="form-label">Nomor Seri</label>
                            <select class="form-control" name="serial_code" id="serial_code">
                                <option value="">Pilih Nomor Seri</option>
								<?php foreach ($detail_barang as $data) { ?>
                                    <!--<option value="<?= $data['serial_code'] ?>"<?= $data['serial_code'] == $Detail_Request['id_barang'] ? "selected":""?>><?= $data['serial_code'] ?></option>-->
										<option value="<?= $data['serial_code'] ?>"<?= $data['serial_code'] == $Detail_Replace['id_barang'] ? "selected":""?>><?= $data['serial_code'] ?></option>
									<?php } ?>
                            </select>
                        </div>
                    </div>
					 <div class="col-md-6">
                    <div class="mb-3">
                        <label for="qty_replace" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="qty_replace" id="qty_replace" min="1"value="<?= $Detail_Replace['qty_replace'] ?>">
                    
                    </div>
                </div>
				<div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" placeholder="Pilih Status...">
                                <option value="">Pilih Status</option>
                                <option value="barang1">Requested</option>
                                <option value="barang2">Finished</option>
                                <option value="barang3">Rejected</option>
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" min="1"value="<?= $Detail_Replace['keterangan'] ?>">
                    
                    </div>
                </div>
                    </div>
                </div>
                </div>
                        <div class="row float-right">
                            <div class="col-md-12">
                                <a href="<?= base_url('Detail_Replace') ?>" class="btn btn-danger" id="deletereplace" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                <button type="submit" class="btn btn-success" id="simpanreplace" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                            </div>
                            </div>
</form>
            </div>
        </div>
    </div>

</div>
