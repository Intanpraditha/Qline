<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-dark">List Admin</h4>
        </div>
    <div class="card-body">
        <div class="card-header py-3">
            <a href="<?php echo base_url('users/tambah'); ?>" class="m-0 font-weight-bold btn btn-primary" >Tambah admin</a>
        </div>
        <form method="post" action="<?= base_url('pasien/hapus_banyak'); ?>">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Pw</th>
                            <th colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->password; ?></td>
                                <td>
                                    <a href="<?php echo base_url('users/edit/'.$user->id); ?>" class="m-0 font-weight-bold btn btn-warning" title="edit"><i class="fas fa-fw fa-pen"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('users/hapus/'.$user->id); ?>" class="m-0 font-weight-bold btn btn-danger" title="hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>


</div>
        </form>    
    </div>
</div>