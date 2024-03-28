<?php include 'Koneksi.php' ?>
<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Data Replace
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Replace/proses_tambah_replace')?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang Replace</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama...">
                    </div>
                </div>
				 <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_replace" class="form-label">Tanggal Replace</label>
                        <input type="date" class="form-control" name="tgl_replace" id="tgl_replace" value="<?= date('Y-m-d')?>">
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
                                    <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
				 <div class="col-md-6">
                        <div class="mb-3">
                            <label for="serial_code" class="form-label">Nomor Seri</label>
                            <select class="form-control" name="serial_code" id="showSerialCode">
                                <option value="">Pilih Nomor Seri</option>
                                
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Barang Replace</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Barang...">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="qty" id="qty" placeholder="Masukkan Kuantitas Barang...">
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
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" min="1">
                    </div>
                    </div>
                </div>
                    </div>
                </div>
                        <div class="row float-right">
                            <div class="col-md-12">
                                <a href="<?= base_url('Replace') ?>" class="btn btn-danger" id="deletereplace" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                <button type="submit" formaction="<?=base_url('Replace/proses_tambah_replace')?>" class="btn btn-success" id="simpanreplace" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                            </div>
                            </div>
            </div>
        </div>
    </div>

</div>
</div>