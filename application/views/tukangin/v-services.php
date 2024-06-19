<!-- Pricing section-->
<section class="bg-light py-5">
	<div class="container px-5 my-5">
		<div class="text-center mb-5">
			<h1 class="fw-bolder">Pay as you grow</h1>
			<p class="lead fw-normal text-muted mb-0">
				With our no hassle pricing plans
			</p>
		</div>

		<?php if (validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
			</div>'
		<?php endif ?>

		<?= $this->session->flashdata('message'); ?>


		<div class="row gx-5 justify-content-center text-nowrap">
			<!-- Pricing card free-->
			<div class="col-lg-6 col-xl-4 text-center" x-data="{ name:'Renovasi', count: 1, harga: 35000, get total() { return this.count * this.harga; }, }">
				<div class="card mb-5 mb-xl">
					<div class="card-body d-flex justify-content-center  align-items-center">
						<div class=" card" style="width: 18rem;">
							<img src="<?= base_url('asset/img/services/p1.jpg') ?>" class="card-img-top" alt="...">
							<div class="card-body d-flex flex-column justify-content-between">
								<h5 class="card-title" x-text="name"></h5>
								<div class="text-center">
									<div>
										<span class="text-muted" x-text="rupiah(harga)"></span> &times;
										<button id="remove" @click="if (count > 1) count--">&minus;</button>
										<span x-text=" count"></span>
										<button id="add" @click="if (count < 8) count++">&plus;</button> =
										<span x-text="rupiah(total)"></span>
									</div>
								</div>
								<hr />
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cekoutModal1">
									Pesan
								</button>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="cekoutModal1" tabindex="-1" aria-labelledby="cekoutModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form class="text-start" action="<?= base_url('tukangin/services'); ?>" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<h1 class="modal-title fs-5" x-text="name"></h1>
												<input type="hidden" name="nama" id="nama" x-bind:value="name">
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<span class="text-muted" x-text="rupiah(harga)"></span> &times;
												<input type="hidden" x-bind:value="rupiah(harga)">
												<span x-text=" count"></span> =
												<input type="hidden" name="jam" id="jam" x-bind:value="count">
												<span x-text="rupiah(total)"></span>
												<input type="hidden" name="total_bayar" id="total_bayar" x-bind:value="total">
												<hr>
												<div class="mb-3">
													<label for="exampleInputEmail1" class="form-label">Email address</label>
													<input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" value="<?= $user['email']; ?>" readonly>
												</div>
												<select name="metode" class="form-select mb-3" aria-label="Default select example">
													<option selected>pilih pembayaran</option>
													<?php foreach ($metode as $m) : ?>
														<option value="<?= $m['id']; ?>"> <?= $m['m_bayar']; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Alamat</label>
													<input name="alamat" id="alamat" type="text" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Nomor</label>
													<input name="nomor" id="nomor" type="number" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="form-group">
													<input name="image" id="image" type="file" class="form-control form-control-user" id="image" name="image">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Bayar</button>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- card 2 -->
			<div class="col-lg-6 col-xl-4 text-center" x-data="{name: 'mural & cat', count: 1, harga: 30000, get total() { return this.count * this.harga; }, }">
				<div class="card mb-5 mb-xl-0">
					<div class="card-body d-flex justify-content-center  align-items-center">
						<div class="card" style="width: 18rem;">
							<img src="<?= base_url('asset/img/services/p2.jpg') ?>" class="card-img-top" alt="...">
							<div class="card-body d-flex flex-column justify-content-between">
								<h5 class="card-title" x-text="name"></h5>
								<div class="text-center">
									<div>
										<span class="text-muted" x-text="rupiah(harga)"></span> &times;
										<button id="remove" @click="if (count > 1) count--">&minus;</button>
										<span x-text=" count"></span>
										<button id="add" @click="if (count < 8) count++">&plus;</button> =
										<span x-text="rupiah(total)"></span>
									</div>
								</div>
								<hr />
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cekoutModa2">
									Pesan
								</button>
							</div>
							<!-- modal 2 -->
							<div class="modal fade" id="cekoutModa2" tabindex="-1" aria-labelledby="cekoutModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form class="text-start" action="<?= base_url('tukangin/services'); ?>" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<h1 class="modal-title fs-5" x-text="name"></h1>
												<input type="hidden" name="nama" id="nama" x-bind:value="name">
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<span class="text-muted" x-text="rupiah(harga)"></span> &times;
												<input type="hidden" x-bind:value="rupiah(harga)">
												<span x-text=" count"></span> =
												<input type="hidden" name="jam" id="jam" x-bind:value="count">
												<span x-text="rupiah(total)"></span>
												<input type="hidden" name="total_bayar" id="total_bayar" x-bind:value="total">
												<hr>
												<div class="mb-3">
													<label for="exampleInputEmail1" class="form-label">Email address</label>
													<input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" value="<?= $user['email']; ?>" readonly>
												</div>
												<select name="metode" class="form-select mb-3" aria-label="Default select example">
													<option selected>pilih pembayaran</option>
													<?php foreach ($metode as $m) : ?>
														<option value="<?= $m['id']; ?>"> <?= $m['m_bayar']; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Alamat</label>
													<input name="alamat" id="alamat" type="text" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Nomor</label>
													<input name="nomor" id="nomor" type="number" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="form-group">
													<input name="image" id="image" type="file" class="form-control form-control-user" id="image" name="image">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Bayar</button>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- card 3 -->
			<div class="col-lg-6 col-xl-4 text-center" x-data="{name:'Saluran air', count: 1, harga: 25000, get total() { return this.count * this.harga; }, }">
				<div class="card mb-5 mb-xl-0">
					<div class="card-body d-flex justify-content-center  align-items-center">
						<div class="card" style="width: 18rem;">
							<img src="<?= base_url('asset/img/services/p3.jpg') ?>" class="card-img-top" alt="...">
							<div class="card-body d-flex flex-column justify-content-between">
								<h5 class="card-title" x-text="name"></h5>
								<div class="text-center">
									<div>
										<span class="text-muted" x-text="rupiah(harga)"></span> &times;
										<button id="remove" @click="if (count > 1) count--">&minus;</button>
										<span x-text=" count"></span>
										<button id="add" @click="if (count < 8) count++">&plus;</button> =
										<span x-text="rupiah(total)"></span>
									</div>
								</div>
								<hr />
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cekoutModal3">
									Pesan
								</button>
							</div>
							<!-- modal 3 -->

							<div class="modal fade" id="cekoutModal3" tabindex="-1" aria-labelledby="cekoutModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form class="text-start" action="<?= base_url('tukangin/services'); ?>" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<h1 class="modal-title fs-5" x-text="name"></h1>
												<input type="hidden" name="nama" id="nama" x-bind:value="name">
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<span class="text-muted" x-text="rupiah(harga)"></span> &times;
												<input type="hidden" x-bind:value="rupiah(harga)">
												<span x-text=" count"></span> =
												<input type="hidden" name="jam" id="jam" x-bind:value="count">
												<span x-text="rupiah(total)"></span>
												<input type="hidden" name="total_bayar" id="total_bayar" x-bind:value="total">
												<hr>
												<div class="mb-3">
													<label for="exampleInputEmail1" class="form-label">Email address</label>
													<input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" value="<?= $user['email']; ?>" readonly>
												</div>
												<select name="metode" class="form-select mb-3" aria-label="Default select example">
													<option selected>pilih pembayaran</option>
													<?php foreach ($metode as $m) : ?>
														<option value="<?= $m['id']; ?>"> <?= $m['m_bayar']; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Alamat</label>
													<input name="alamat" id="alamat" type="text" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="mb-3">
													<label for="exampleInputPassword1" class="form-label">Nomor</label>
													<input name="nomor" id="nomor" type="number" class="form-control" id="exampleInputPassword1">
												</div>
												<div class="form-group">
													<input name="image" id="image" type="file" class="form-control form-control-user" id="image" name="image">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Bayar</button>
												</div>

											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Pricing card enterprise-->
		</div>
	</div>
</section>