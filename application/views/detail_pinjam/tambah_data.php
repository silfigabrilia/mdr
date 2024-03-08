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
        <form action="<?= base_url('Detail_pinjam/proses_tambah') ?>" method="POST">
            <div class="ibox-body">
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_satuan" class="form-label">ID Detail Pinjam</label>
                            <input type="text" class="form-control" name="nama" id="id_detail_pinjam" placeholder="Masukkan nama barang...">
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_pinjam" class="form-label">ID Pinjam</label>
                            <input type="number" class="form-control" name="id_pinjam" id="id_pinjam">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_detail_barang" class="form-label">ID Detail Barang</label>
                            <input type="text" class="form-control" name="id_detail_barang" id="id_detail_barang " placeholder="Masukkan nama barang...">
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
            <a href="<?= base_url('Detail_pinjam') ?>" class="btn btn-danger" id="deleteSatuan" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
            <button type="submit" formaction="<?= base_url('Detail_pinjam/proses_tambah') ?>" class="btn btn-success" id="simpansatuan" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
        </div>
    </div>
    </form>
</div>
</div>