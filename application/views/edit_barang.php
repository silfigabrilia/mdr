<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Edit Barang
                <!-- <?php
                
        echo var_dump($Barang);
                ?> -->
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Barang/proses_ubah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang..." value="<?= $Barang['nama_barang'] ?>"> 
                            <input type="hidden" name="id_barang" id="id_barang" value="<?= $Barang['id_barang'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="stok" min="1" value="<?= $Barang['stok'] ?>">
                        </div>
                    <!--</div>-->
                    <!-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">Satuan ID</label>
                            <input type="text" class="form-control" name="satuan_id" id="satuan_id" min="1" value="<?= $Barang['satuan_id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis_id" class="form-label">Jenis ID</label>
                            <input type="number" class="form-control" name="jenis_id" id="jenis_id" min="1" value="<?= $Barang['jenis_id'] ?>">
                        </div> -->
                        <!--<div class="row">-->
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <a href="<?= base_url('Barang') ?>" class="btn btn-danger" id="barang" style="cursor: pointer;"><i class="ti ti-reload"></i> Kembali</a>
                                    <button type="submit" formaction="<?= base_url('Barang/proses_ubah') ?>" class="btn btn-success" id="btn-save-mtact" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>