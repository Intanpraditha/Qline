<!-- application/views/users/form.php -->

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<div class="card shadow mb-4">
<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Tambah admin</h6>
    </div>
    <div class="card-body">

<form action="<?php echo base_url('users/simpan'); ?>" method="post">
    <label for="username">Username:</label>
    <input class="form-control" type="text" name="username" id="username"><br>

    <label for="password">Password:</label>
    <input class="form-control" type="password" name="password" id="password"><br>

    <input type="submit" value="simpan" class="btn btn-success"> 
</form>
</div>
</div>
</div>
