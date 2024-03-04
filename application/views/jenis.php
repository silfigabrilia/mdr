<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Jenis Barang</div>
        </div>
        <div class="col-auto">
                <a href="<?= base_url('jenis/tambah_jenis') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Jenis Barang
                    </span>
                </a>
            </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Jenis</th>
                    <th>Jenis Barang</th>
                    <th>Nomor Seri</th>
                    <!-- <th>ID Satuan</th>
                    <th>ID Jenis</th> -->
                    <th>Aksi</th>
                </tr>
                <?php 
                $no = 1;
                foreach($jenis as $j){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $j->id_jenis ?></td>
                        <td><?php echo $j->nama_jenis ?></td>
                        <td><?php echo $j->nomor_seri ?></td>
                        <td>
                        <a href="<?= base_url('Jenis/edit_data/') . $j->id_jenis ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('Jenis/hapus_data/') . $j->id_jenis ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                <?php } ?>
            </thead>
        </table>
    </div>
</div>

