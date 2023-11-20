<!-- application/views/users/form.php -->

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<div class="card shadow mb-4">
<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Edit admin</h6>
    </div>
    <div class="card-body">

<form action="<?php echo isset($user) ? base_url('users/update/'.$user->id) : base_url('users/create'); ?>" method="post">
    <label for="username">Username:</label>
    <input class="form-control" type="text" name="username" id="username" value="<?php echo isset($user) ? $user->username : ''; ?>"><br>

    <label for="password">Password:</label>
    <input class="form-control" type="password" name="password" id="password" value="<?php echo isset($user) ? $user->password : ''; ?>"><br>

    <input type="submit" value="simpan" class="btn btn-success">
</form>

</body>
</html>
</div>
</div>
</div>