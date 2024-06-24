<!-- Begin Page Content -->
<div class="container-fluid vh-100">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>


    <div class="row">
        <div class="table-responsive table-bordered col-sm-6  mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-primary mt-2 "> Data
                    User</span>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Member Sejak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($anggota as $a) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['name']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= $a['role_id']; ?></td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('Y', $a['date_created']); ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" data-menu="" checked>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->