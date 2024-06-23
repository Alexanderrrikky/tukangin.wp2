<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($menu as $m) { ?>
                <form action="<?= base_url('menu/editmenu'); ?>" method="post">

                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $m['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="menu" name="menu" placeholder="Masikan role id" value="<?= $m['menu']; ?>">
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