<!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p12">

  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <?php Flasher::flash(); ?>
          </div>
      </div>

      <div class="row mb-3">
        <div class="col-lg-6">
        <form action="<?=BASE_URL;?>/matapelajaran/tambah" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Mapel">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
                </div>
            </div>  
        </form>
        </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-6">
            <form action="<?=BASE_URL;?>/siswa/cari" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Mapel" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="tombolCari">Go</button>
                </div>
              </div>
            </form>
          </div>
      </div>
      <div class="row">
          <div class="col-6">
              <h3>Daftar Matapelajaran</h3>

              <ul class="list-group">
                      <?php foreach ($data['mapel'] as $mp) : ?>
                          <li class="list-group-item">
                              <?=$mp['nama'];?>
                              <a class="badge badge-danger text-white float-right ml-1"  onclick="return confirmSwal(<?=$mp['id_mapel'];?>)">Hapus</a>
                              
                              <script>
                                function confirmSwal(mapelId) {
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
                                      window.location.href = "<?=BASE_URL;?>/matapelajaran/hapus/" + mapelId;
                                    }
                                  });
                                  return false; // Kembalikan false untuk menghentikan tautan dari mengarahkan ke URL secara default
                                }
                              </script>
                              <a href="<?=BASE_URL;?>/mahasiswa/ubah/<?=$mhs['id'];?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a> 
                          </li>
                      <?php endforeach;?>
              </ul>
                  
          </div>
      </div>
  </div>
                                                </div>
  