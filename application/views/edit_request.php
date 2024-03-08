<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Request
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Request/proses_ubah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama barang..." value="<?= $Request['nama'] ?>"> 
                            <input type="hidden" name="id_request" id="id_request" value="<?= $Request['id_request'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tgl_request" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tgl_request" id="tgl_request" value="<?= $Request['tgl_request'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option value="">Pilih ID</option>
                                <?php foreach ($barang as $data) { ?>
                                    <option value="<?= $data['id_barang'] ?>"><?= $data['id_barang'] ?></option>
                                <?php } ?>
                                <!-- tambahkan opsi barang lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jenis_id" min="1" value="<?= $Request['jumlah'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" min="1" value="<?= $Request['keterangan'] ?>">
                        </div>
                        <!-- <div class="row"> -->
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <a href="<?= base_url('Request') ?>" class="btn btn-danger" id="barang" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                    <button type="submit" formaction="<?= base_url('Request/proses_ubah') ?>" class="btn btn-success" id="btn-save-mtact" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>