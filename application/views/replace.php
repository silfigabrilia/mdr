<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url('assets'); ?>/css/replace.css" rel="stylesheet" />
</head>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Replace</div>
        </div>
        <div class="col-auto">
                <a href="<?= base_url('replace/tambah_data_replace') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Data Replace
                    </span>
                </a>
            </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Replace</th>
                    <th>Nama Barang Replace</th>
                    <th>Tanggal Replace</th>
                    <th>ID Barang</th>
					<th>Nomor Seri</th>
                    <th>Jumlah Replace</th>
					<th>Quantity</th>
					<th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $no = 1;
                foreach($replace as $r){
					$status_class = $r->status === 'requested' ? 'table-requested-row' : '';
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $r->id_replace ?></td>
                        <td><?php echo $r->nama ?></td>
                        <td><?php echo $r->tgl_replace ?></td>
                        <td><?php echo $r->id_barang ?></td>
						<td><?php echo $r->serial_code ?></td>
                        <td><?php echo $r->jumlah ?></td>
                        <td><?php echo $r->qty ?></td>
						<td><?php echo $r->status ?></td>
                        <td><?php echo $r->keterangan ?></td>
                        <td>
                        <a href="<?= base_url('Detail_Replace/init/') . $r->id_barang ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url('Replace/edit_replace/') . $r->id_replace ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('Replace/hapus_replace/') . $r->id_replace ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                <?php } ?>
            </thead>
        </table>
    </div>
</div>

