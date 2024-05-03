<?php include 'koneksi.php' ?>
<div class="page-heading">
    <h1 class="page-title"></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Detail Pinjam
            </div>
        </div>
        <div class="ibox-body">
		
            <form action="<?= base_url('Detail_pinjam/proses_ubah/') ?>" method="POST">
			<div class="row">			
				
					 <div class="col-md-6">
                        <div class="mb-3">
                             <label  class="form-label">Nama Barang</label>
                        <div class="input-group">
                            <select class="form-control" name="id_barang" id="getIdBarang" required>
                                <option value="" >Pilih Barang</option>
                                <?php 
								//foreach ($barang as $data) { 
								 $itembarang = mysqli_query($koneksi, "SELECT * FROM barang");
								while ($b = mysqli_fetch_array($itembarang)) {
									$selected = ($b['id_barang'] == $Detail_pinjam['id_barang']) ? "selected" : ""; ?>
									<option value="<?= $b['id_barang'] ?>" <?= $selected ?>>
										<?= $b['nama_barang'] ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="item-description" class="form-label">Item Description</label>
                            <select class="form-control" name="id_detail_barang" id="id_detail_barang">
                                <option value="">Pilih Barang</option>
                                <?php foreach ($detail_barang as $data) { ?>
                                    <option value="<?= $data['item_description'] ?>" <?= $data['item_description'] == $Detail_Barang['item_description'] ? "selected" : ""; ?>>
									<?= $data['item_description'] ?>
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
								<?php foreach ($detail_barang as $data) { ?>
								<option value="<?= $data['serial_code'] ?>" <?= $data['serial_code'] == $Detail_pinjam['serial_code'] ? "selected" : "" ?>>
									<?= $data['serial_code'] ?>
								</option>
							<?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="col-md-6">
                    <div class="mb-3">
                        <label for="qtty" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="qtty" id="qtty" placeholder="Masukkan Kuantitas Quantity..." value="<?= $Detail_pinjam['qtty'] ?>">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan nama Keterangan..." value="<?= $Detail_pinjam['keterangan'] ?>">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="row float-right">
           <div class="col-md-12">
           
           <button href="<?= base_url('Detail_pinjam/proses_ubah') ?>" class="btn btn-success" id="btn-save-mtact" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
       </div>
       </div>
    </form>

</div>
</div>
