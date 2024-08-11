<!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">

  <div class="container mt-3">
      <div class="row">
          <div class="col-lg-6">
              <?php Flasher::flash(); ?>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-6">
            <form action="<?=BASE_URL;?>/mahasiswa/cari" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="tombolCari">Go</button>
                </div>
              </div>
            </form>
          </div>
      </div>
      
      <div class="row">
          <div class="col-6">
              <h3>Daftar Mahasiswa</h3>

              <ul class="list-group">
                      <?php foreach ($data['mhs'] as $mhs) : ?>
                          <li class="list-group-item">
                              <?=$mhs['nama'];?>
                              <a class="badge badge-danger text-white float-right ml-1"  onclick="return confirmSwal(<?=$mhs['id'];?>)">Hapus</a>
                              
                              <script>
                                function confirmSwal(mahasiswaId) {
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
                                      window.location.href = "<?=BASE_URL;?>/mahasiswa/hapus/" + mahasiswaId;
                                    }
                                  });
                                  return false; // Kembalikan false untuk menghentikan tautan dari mengarahkan ke URL secara default
                                }
                              </script>
                              <a href="<?=BASE_URL;?>/mahasiswa/ubah/<?=$mhs['id'];?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a> 
                              <a href="<?=BASE_URL;?>/mahasiswa/detail/<?=$mhs['id'];?>" class="badge badge-primary float-right ml-1">Detail</a>
                          </li>
                      <?php endforeach;?>
              </ul>
                  
          </div>
      </div>

  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=BASE_URL;?>/mahasiswa/tambah" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
          </div>  
          <div class="form-group">
              <label for="nrp">Nrp</label>
              <input type="number" class="form-control" id="nrp" name="nrp">
          </div>  
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan">
                  <option value="Teknik Informatika">Teknik Informatika</option>
                  <option value="Sistem Informasi">Sistem Informasi</option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <a href="mahasiswa" type="button" class="btn btn-secondary">Close</a>
          <button type="Submit" class="btn btn-primary">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  