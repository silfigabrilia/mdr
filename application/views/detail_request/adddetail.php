<div class="page-heading">
    <h1 class="page-title"><?= $title ?></h1>
</div>
<div class="row justify-content-center">
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                Form Tambah Request
            </div>
        </div>
        <div class="ibox-body">
            <form action="<?= base_url('Detail_request/proses_tambah') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_barang_request" class="form-label">Nama Barang Request</label>
                            <input type="text" class="form-control" name="nama_barang_request" id="nama_barang_request" placeholder="Masukkan nama barang..."> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_request" class="form-label">Jumlah Request</label>
                            <input type="number" class="form-control" name="jumlah_request" id="jumlah_request" min="1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan...">
                        </div>
                    </div>
                    
					<div class="row form-group">
                    <label class="col-md-5 text-md-right" for="id_barang">ID Barang</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option value="" >Pilih Barang</option>
                                <?php foreach ($barang as $data) { ?>
                                    <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                                <?php } ?>
                            </select>
							<?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number" min="1">
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
                            <label for="tanggal_waktu" class="form-label">Tanggal Waktu</label>
                            <input type="date" class="form-control" name="tanggal_waktu" id="tanggal_waktu" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" class="form-control" name="status" id="status" >
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="row float-right">
                                <div class="col-md-12">
                                    <button type="submit" formaction="<?= base_url('Detail_Request/proses_tambah') ?>" class="btn btn-success" id="simpan" style="cursor: pointer;"><i class="ti ti-save"></i> Simpan</button>
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