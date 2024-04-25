<div class="page-heading">
    <h1 class="page-title"></h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">
                <a href="<?= base_url('Detail_pinjam/tambah_detail/'.$id.'') ?>" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah Detail Pinjam</a>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>id_detail_pinjam</th>
                        <th>id pinjam</th>
                        <th>id_detail_barang</th>
						<th>nama_barang</th>
						<th>serial_code</th>
						<th>item_description</th>
						<th>qtty</th>
                        <th>keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($Detail_pinjam as $dp) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $dp->id_detail_pinjam ?></td>
                            <td><?php echo $dp->id_pinjam ?></td>
                            <td><?php echo $dp->id_detail_barang ?></td>
							<td><?php echo $dp->nama_barang ?></td>
							<td><?php echo $dp->serial_code ?></td>
							<td><?php echo $dp->item_description ?></td>
							<td><?php echo $dp->qtty ?></td>
                            <td><?php echo $dp->keterangan ?></td>
                            <td>
                                <a href="<?= base_url('detail_pinjam/edit_data/') . $dp->id_detail_pinjam  ?>" class="btn btn-warning" title="Edit pinjam"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url('detail_pinjam/hapus/') . $dp->id_detail_pinjam  ?>" class="btn btn-danger" onclick="alert('Apakah anda yakin ingin menghapus?')" id="delete" title="Hapus" style="cursor: pointer;"><i class="ti ti-trash"></i></button>

                            </td>
                        </tr>
                        </tr>
                </thead>
                <tbody>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>