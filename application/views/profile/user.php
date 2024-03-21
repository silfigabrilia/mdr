<div class="page-heading">
    <h1 class="page-title">My Profile</h1>
</div>
<div class="container">
    <!--<div class="row">-->
	<div class="row justify-content-center">
        <div class="col-md-6 offset-md-4">
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nama:</label>
						<?php if ($user['role_id'] == 1) : ?>
                            <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" readonly>
                        <?php else : ?>
                            <input type="text" class="form-control" id="name" value="Data tidak tersedia" readonly>
                        <?php endif; ?>
						
                        <!--<?php if ($user !== null) : ?>
                            <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" readonly>
                        <?php else : ?>
                            <input type="text" class="form-control" id="name" value="Data tidak tersedia" readonly>
                        <?php endif; ?>-->
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <?php if (!empty($user) && isset($user['email'])) : ?>
                            <input type="email" class="form-control" id="email" value="<?= $user['email'] ?>" readonly>
                        <?php else : ?>
                            <input type="email" class="form-control" id="email" value="Data tidak tersedia" readonly>
                        <?php endif; ?>
                    </div>
                    <!-- Tambahkan field tambahan sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div>
</div>