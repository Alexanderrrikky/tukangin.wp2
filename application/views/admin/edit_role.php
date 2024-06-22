<div class="row">
    <div class="container-fluid h-100">
        <div class="row">
            <div class="col-lg-6">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <?php foreach ($role as $r) { ?>
                    <form action="<?= base_url('admin/editrole'); ?>" method="post">

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?php echo $r['id']; ?>">
                            <input type="text" class="form-control form-control-user" id="role" name="role" placeholder="Masikan role id" value="<?= $r['role']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                            <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>