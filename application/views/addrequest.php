<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Request
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Request/proses_tambah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama barang..."> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tgl_request" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tgl_request" id="tgl_request" min="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <input type="text" class="form-control" name="barang" id="id_barang" min="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" min="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan...">
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <button type="submit" formaction="<?= base_url('Request/proses_tambah') ?>" class="btn btn-success" id="simpan" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
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