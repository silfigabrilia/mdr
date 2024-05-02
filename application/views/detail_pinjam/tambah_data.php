<?php include 'koneksi.php' ?>
<div class="page-heading">
    <h1 class="page-title"></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Detail
            </div>
        </div>
        <form action="<?= base_url('Detail_pinjam/proses_tambah/') ?>" method="POST">
            <div class="ibox-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_pinjam" class="form-label">ID Pinjam</label>
                            <input type="text" class="form-control" name="id_pinjam" id="id_pinjam" placeholder="Masukkan id pinjam..." value="<?= $id ?>" readonly>
                        </div>
                    </div> 
					<div class="col-md-6">
					<div class="mb-3">
						<label for="id_detail_barang" class="form-label">Id Detail Barang</label>
						<select class="form-control" name="id_detail_barang" id="id_detail_barang">
							<option value="">Pilih Barang</option>
							<?php 
							// Pastikan $barang berisi data sebelum di-loop
							if(isset($detail_barang) && !empty($detail_barang)) {
								foreach ($detail_barang as $data) { 
							?>
							<option value="<?= $data['id_detail_barang'] ?>"><?= $data['id_detail_barang'] ?></option>
							<?php 
								} 
							}
							?>
							<!--tambahkan opsi barang lainnya sesuai kebutuhan -->
						</select>
					</div>
				</div>


					 <div class="col-md-6">
                        <div class="mb-3">
                             <label  class="form-label">Nama Barang</label>
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
                            <label for="item-description" class="form-label">Item Description</label>
                            <select class="form-control" name="id_detail_barang" id="id_detail_barang">
                                <option value="">Pilih Item Description</option>
                                <?php foreach ($detail_barang as $data) { ?>
                                    <option value="<?= $data['item_description'] ?>"><?= $data['item_description'] ?></option>
                                <?php } ?>
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>

				<div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Serial Code</label>
                            <select class="form-control" name="serial_code" id="showSerialCode">
                                <option value="">Pilih Nomor Seri</option>
								
                            </select>
                        </div>
                    </div>
					<div class="col-md-6">
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="qtty" id="qtty" placeholder="Masukkan Kuantitas Barang...">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan nama barang...">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row float-right">
        <div class="col-md-12">
           <!-- <a href="<?= base_url('Detail_pinjam') ?>" class="btn btn-danger" id="deleteSatuan" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>-->
            <button type="submit" formaction="<?= base_url('Detail_pinjam/proses_tambah') ?>" class="btn btn-success" id="simpansatuan" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
        </div>
    </div>
    </form>
</div>
</div>