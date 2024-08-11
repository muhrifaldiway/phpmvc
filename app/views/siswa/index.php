<!-- PAGE CONTAINER-->
<div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p12">

  <div class="container mt-3">
      <div class="row">
          <div class="col-lg-6">
              <?php Flasher::flash(); ?>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#siswaModal">
                Tambah Data Siswa
            </button>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-6">
            <form action="<?=BASE_URL;?>/siswa/cari" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Siswa" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="tombolCari">Go</button>
                </div>
              </div>
            </form>
          </div>
      </div>

        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no= 1; foreach ($data['siswa'] as $sw) : ?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=$sw['nama'];?></td>
                                                 
                                                <td>
                                                <?php 
                                                  $kelas_id = $sw['kelas_id'];
                                                  $found = false; // Menambahkan variabel untuk melacak apakah data sudah ditemukan
                                                  foreach ($data['kelas_s'] as $ks) {
                                                      if ($ks['kelas_id'] == $kelas_id) {
                                                          echo $ks['nama'];
                                                          $found = true; // Menandai bahwa data sudah ditemukan
                                                          break; // Keluar dari loop setelah menemukan data yang cocok
                                                      }
                                                  }

                                                  // Jika data tidak ditemukan, Anda bisa menambahkan pesan khusus di sini
                                                  if (!$found) {
                                                      echo "Tidak ditemukan data kelas"; // Ganti dengan pesan yang sesuai
                                                  }
                                                  ?>
                                                </td>
                                                <td><?=$sw['jenis_kelamin'];?></td>
                                                <td class="process"><?=$sw['alamat'];?></td>
                                                <td><?=$sw['telepon'];?></td>
                                                <td>
                                                  <a href="<?=BASE_URL;?>/nilai/<?=$sw['id_siswa'];?>" class="badge badge-success float-right ml-1">Nilai</a>
                                                
                                                <a class="badge badge-danger text-white float-right ml-1"  onclick="return confirmSwal(<?=$sw['id_siswa'];?>)">Hapus</a>
                              
                                                  <script>
                                                    function confirmSwal(siswaId) {
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
                                                          window.location.href = "<?=BASE_URL;?>/siswa/hapus/" + siswaId;
                                                        }
                                                      });
                                                      return false; // Kembalikan false untuk menghentikan tautan dari mengarahkan ke URL secara default
                                                    }
                                                    </script>
                                                  <a href="<?=BASE_URL;?>/siswa/ubah/<?=$sw['id_siswa'];?>" class="badge badge-warning float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $sw['id_siswa']; ?>">Ubah</a> 
                                                  <a href="<?=BASE_URL;?>/siswa/detail/<?=$sw['id_siswa'];?>" class="badge badge-primary float-right ml-1">Detail</a>

                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->

  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="formModalSiswa" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalSiswa">Tambah Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=BASE_URL;?>/siswa/tambah" method="POST">
          <input type="hidden" name="id_siswa" id="id_siswa">
          <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
          </div>  
          <div class="form-group">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas_id" name="kelas_id">
                  <option>Silahkan Pilih!</option>
                  <?php foreach ($data['kelas'] as $kl) : ?> 
                  <option value="<?=$kl['id_kelas'];?>"><?=$kl['nama'];?></option>
                  <?php endforeach;?>
              </select>
          </div> 
          <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                  <option value="">Silahkan Pilih</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div> 
          
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
          <div class="form-group">
              <label for="telepon">No Handphone</label>
              <input type="number" class="form-control" id="telepon" name="telepon">
          </div>
          <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="textarea" class="form-control" id="keterangan" name="keterangan">
          </div>
        <div class="modal-footer">
          <a href="siswa" type="button" class="btn btn-secondary">Close</a>
          <button type="Submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  