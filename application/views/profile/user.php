<div class="page-heading">
    <h1 class="page-title">My Profile</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <?php if (!empty($user) && isset('name'])) : ?>
                            <input type="text" class="form-control" id="name" value="<?= ['name'] ?>" readonly>
                        <?php else : ?>
                            <input type="text" class="form-control" id="name" value="Data tidak tersedia" readonly>
                        <?php endif; ?>
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