<!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">

  <div class="container mt-3">
      
        <div class="row mb-3">
          <div class="col-lg-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-4">
            <form action="<?=BASE_URL;?>/kelas/cari" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Kelas" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="tombolCari">Go</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      <div class="row">
          <div class="col-lg-6">
              <?php Flasher::flash(); ?>
          </div>
      </div>
      <div class="row">
          <div class="col-6">
              <h3>Daftar Siswa</h3>

              <ul class="list-group">
                      <?php foreach ($data['kelas'] as $kl) : ?>
                          <li class="list-group-item">
                              <?=$kl['nama'];?>
                              <a class="badge badge-danger text-white float-right ml-1"  onclick="return confirmSwal(<?=$kl['id_kelas'];?>)">Hapus</a>
                              
                              <script>
                                function confirmSwal(kelasId) {
                                  Swal.fire({
                                    title: 'Anda yakin ingin menghapus?',
                                    text: "Tindakan ini tidak dapat dibatalkan!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Ya, Hapus!',
                                    cancelButtonText: 'Batal'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                      // Jika pengguna mengklik "Ya", lakukan tindakan penghapusan di sini
                                      window.location.href = "<?=BASE_URL;?>/kelas/hapus/" + kelasId;
                                    }
                                  });
                                  return false; // Kembalikan false untuk menghentikan tautan dari mengarahkan ke URL secara default
                                }
                              </script>
                              <button href="<?=$kl['id_kelas'];?>" class="badge badge-success float-right ml-1" data-toggle="modal" data-target="#modalUbah<?=$kl['id_kelas'];?>">Ubah</button>
                              
                          </li>
                      <?php endforeach;?>
              </ul>
                  
          </div>
      </div>

      </div>
  </div>
  <!-- modal static -->
  <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Tambah Data Kelas</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?=BASE_URL;?>/kelas/tambah" method="POST">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>                
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
            </form>
					</div>
				</div>
			</div>
      <?php foreach ($data['kelas'] as $kl) : ?>
      <div class="modal fade" id="modalUbah<?=$kl['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Ubah Data Kelas</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?=BASE_URL;?>/kelas/ubah" method="POST">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="hidden" id="id_kelas" name="id_kelas" value="<?=$kl['id_kelas'];?>">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?=$kl['nama'];?>">
                </div>                
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-success">Ubah</button>
						</div>
            </form>
					</div>
				</div>
      </div>
      <?php endforeach;?>           

