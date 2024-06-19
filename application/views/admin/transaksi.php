<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>

    <div class="row">
        <!-- <div class="col-lg-12"> -->

        <div class="table-responsive table-bordered col-sm-12  mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-book text-warning mt-2"> Data pesanan</span>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jasa</th>
                            <th>jam</th>
                            <th>Total bayar</th>
                            <th>Email</th>
                            <th>Metode</th>
                            <th>Alamat</th>
                            <th>Nomor</th>
                            <th>Tanggal pesanan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($transaksi as $t) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['jam']; ?></td>
                                <td><?= $t['total_bayar']; ?></td>
                                <td><?= $t['email']; ?></td>
                                <td><?= $t['metode']; ?></td>
                                <td><?= $t['alamat']; ?></td>
                                <td><?= $t['nomor']; ?></td>
                                <td><?= date('d', $t['tgl']); ?></td>
                                <td>
                                    <picture>
                                        <source srcset="" type="image/svg+xml">
                                        <img width="250" height="250" src="<?= base_url('asset/img/upload/') . $t['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                    </picture>
                                </td>
                                <td>
                                    <a href="" class="badge badge-success">konfirmasi</a>
                                    <a href="" class="badge badge-danger">Batalkan</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>