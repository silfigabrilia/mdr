<?php include 'Koneksi.php' ?>
<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Detail Request
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Detail_Request/proses_ubah') ?>" method="POST">
            <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_barang_request" class="form-label">Nama Barang Request</label>
                            <input type="text" class="form-control" name="nama_barang_request" id="nama_barang_request" placeholder="Masukkan nama barang..." value="<?= $Detail_Request['nama_barang_request'] ?>"> 
                            <input type="hidden" name="id_detail_request" id="id_detail_request" value="<?= $Detail_Request['id_detail_request'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_request" class="form-label">Jumlah Request</label>
                            <input type="number" class="form-control" name="jumlah_request" id="jumlah_request" min="1" value="<?= $Detail_Request['jumlah_request'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan..." value="<?= $Detail_Request['keterangan'] ?>">
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
                                    <option value="<?= $b['id_barang'] ?>"<?= $b['id_barang'] == $Detail_Request['id_barang'] ? "selected":""?>><?= $b['nama_barang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="serial_code" class="form-label">Serial Number</label>
                            <select class="form-control" name="serial_code" id="serial_code">
                                <option value="">Pilih Nomor Seri</option>
								<?php foreach ($detail_barang as $data) { ?>
                                    <!--<option value="<?= $data['serial_code'] ?>"<?= $data['serial_code'] == $Detail_Request['id_barang'] ? "selected":""?>><?= $data['serial_code'] ?></option>-->
									<option value="<?= $data['serial_code'] ?>"<?= $data['serial_code'] == $data['id_barang'] ? "selected":""?>><?= $data['serial_code'] ?></option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" value="<?= $Detail_Request['jumlah'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_waktu" class="form-label">Tanggal Waktu</label>
                            <input type="date" class="form-control" name="tanggal_waktu" id="tanggal_waktu" value="<?= $Detail_Request['tanggal_waktu'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" placeholder="Pilih Status...">
                                <option value="">Pilih Status</option>
                                <option value="Requested">Requested</option>
                                <option value="Finished">Finished</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
					</div>
                        <!-- <div class="row"> -->
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <a href="<?= base_url('detail_request')?>" class="btn btn-danger" id="barang" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                    <button type="submit" formaction="<?= base_url('Detail_Request/proses_ubah') ?>" class="btn btn-success" id="btn-save-mtact" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </form>
        </div>
    </div>

