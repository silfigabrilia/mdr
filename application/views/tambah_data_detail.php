<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Data Detail Replace
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Detail_Replace/proses_tambah_detail')?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_replace" class="form-label">Nama Barang Replace</label>
                        <input type="text" class="form-control" name="nama_replace" id="nama" placeholder="Masukkan Nama Barang Replace...">
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_replace" class="form-label">Tanggal Replace</label>
                        <input type="date" class="form-control" name="tgl_replace" id="tgl_replace" placeholder="Masukkan Jumlah Barang...">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option value="">Pilih ID</option>
                                <?php foreach ($barang as $data) { ?>
                                    <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                                <?php } ?>
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
					 <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_seri" class="form-label">Nomor Seri</label>
                            <select class="form-control" name="nomor_seri" id="momor_seri" required>
                                <option value="">Pilih Nomor Seri</option>
                                <?php foreach ($detail_barang as $data) { ?>
                                    <option value="<?= $data['serial_code'] ?>"><?= $data['serial_code'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_replace" class="form-label">Jumlah Barang Replace</label>
                        <input type="tex" class="form-control" name="jml_replace" id="jml_replace" placeholder="Masukkan Jumlah Barang...">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="qty_replace" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="qty_replace" id="qty_replace" placeholder="Masukkan Kuantitas Barang...">
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
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan...">
                    </div>
                    </div>
                </div>
                    </div>
                </div>
                        <div class="row float-right">
                            <div class="col-md-12">
                                <a href="<?= base_url('Detail_Replace') ?>" class="btn btn-danger" id="deletereplace" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                <button type="submit" formaction="<?=base_url('Detail_Replace/proses_tambah_detail')?>" class="btn btn-success" id="simpanreplace" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                            </div>
                            </div>
            </div>
        </div>
    </div>

</div>
</div>