<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Barang
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Barang/proses_tambah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama" id="nama_barang" placeholder="Masukkan nama barang..."> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="stok" min="1">
                        </div>
                    <!-- </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan ID</label>
                            <input type="text" class="form-control" name="satuan" id="satuan_id" min="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_id" class="form-label">Jenis ID</label>
                            <input type="number" class="form-control" name="jenis" id="jenis_id" min="1">
                        </div> -->
                        <!-- <div class="row"> -->
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <button type="submit" formaction="<?= base_url('Barang/proses_tambah') ?>" class="btn btn-success" id="simpanbarang" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
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