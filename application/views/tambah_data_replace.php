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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama...">
                    </div>
                </div>
                <!-- <div class="col-md-6"> -->
                    <div class="mb-3">
                        <label for="tgl_replace" class="form-label">Tanggal Replace</label>
                        <input type="date" class="form-control" name="tgl_replace" id="tgl_replace">
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah...">
                    </div>
                </div>
                <!-- <div class="col-md-6"> -->
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