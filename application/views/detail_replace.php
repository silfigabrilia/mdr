<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Detail Replace</div>
        </div>
        <div class="col-auto">
                <a href="<?= base_url('Detail_replace/tambah_data_detail') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Data Detail Replace
                    </span>
                </a>
            </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Detail Replace</th>
                    <th>Nama Barang Replace</th>
                    <th>Tanggal Replace</th>
                    <th>ID Barang</th>
                    <th>Jumlah Replace</th>
                    <th>Quantity</th>
                    <th>No Seri</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $no = 1;
                foreach($Detail_Replace as $d){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $d->id_detail_replace ?></td>
                        <td><?php echo $d->nama_replace ?></td>
                        <td><?php echo $d->tgl_replace ?></td>
                        <td><?php echo $d->id_barang ?></td>
                        <td><?php echo $d->jml_replace ?></td>
                        <td><?php echo $d->qty_replace ?></td>
                        <td><?php echo $d->serial_code ?></td>
                        <td><?php echo $d->status ?></td>
                        <td><?php echo $d->keterangan ?></td>
                        <td>
						
                        <a href="<?= base_url('Detail_Replace/edit_detail/') . $d->id_detail_replace ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('Detail_Replace/del_replace/') . $d->id_detail_replace ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                <?php } ?>
            </thead>
        </table>
    </div>
</div>

