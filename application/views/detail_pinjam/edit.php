<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Detail Pinjam
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Detail_pinjam/proses_ubah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_pinjam" class="form-label">id_pinjam</label>
                            <input type="number" class="form-control" name="id_pinjam" id="id_pinjam" value="<?= $Detail_pinjam['id_pinjam'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_detail_barang" class="form-label">id_detail_barang</label>
                            <input type="text" class="form-control" name="id_detail_barang" id="id_detail_barang" placeholder="Masukkan  Detail Barang..." value="<?= $Detail_pinjam['id_detail_barang'] ?>">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan..." value="<?= $Detail_pinjam['keterangan'] ?>">

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row float-right">
        <div class="col-md-12">
            <a href="<?= base_url('Detail_pinjam') ?>" class="btn btn-danger" id="deleteSatuan" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
            <button type="submit" formaction="<?= base_url('Detail_pinjam/proses_ubah') ?>" class="btn btn-success" id="simpansatuan" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
        </div>
    </div>
    </form>

</div>
</div>