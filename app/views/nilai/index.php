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
            <form action="<?= BASE_URL; ?>/Nilai" method="POST">
                <div class="form-group">
                    <label for="filterKelas">Filter berdasarkan Kelas:</label><br>
                    <select class="dropdown-toggle btn btn-primary" id="filterKelas" name="filterKelas">
                      <option value="">Semua Kelas</option>
                      <?php foreach ($data['kelas'] as $kelas) : ?>
                            <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                  <button type="submit" class="btn btn-warning">Filter</button>
                  <a href="<?= BASE_URL; ?>/Nilai" class="btn btn-danger">Reset</a>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nilaiModal">
                      Tambah Data Nilai
                  </button>
                </div>
            </form>
          </div>
      </div>

              <!-- DATA TABLE -->
      <div class="table-responsive m-b-40">
          <?php
            $selectedKelas = isset($_POST['filterKelas']) ? $_POST['filterKelas'] : '';

            echo '<table class="table table-borderless table-data3">';
            echo '<thead>';
            echo '<tr class="text-center">';
            echo '<th>No</th>';
            echo '<th>Nama</th>';
            echo '<th>Praktek Harian</th>';
            echo '<th>Praktek Semester</th>';
            echo '<th>Nilai Tengah Semester</th>';
            echo '<th>Praktek Akhir</th>';
            echo '<th>Nilai Akhir</th>';
            echo '<th>Rata-Rata</th>';
            echo '<th>Keterangan</th>';
            echo '<th>Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = 1;
            foreach ($data['nilai'] as $n) {
                // Check if the filter is empty or the class matches
                if (empty($selectedKelas) || $n['kelas_id'] == $selectedKelas) {
                    echo '<tr class="text-center">';
                    echo '<td>' . $no++ . '</td>';
                    echo '<td>';
                      $siswa_id = $n['siswa_id'];
                      foreach ($data['nama'] as $sn) {
                          if ($sn['siswa_id'] == $siswa_id) {
                              echo $sn['nama'];
                          }
                      }
                    echo '</td>';
                    echo '<td>' . $n['praktek_harian'] . '</td>';
                    echo '<td>' . $n['praktek_semester'] . '</td>';
                    $praktek_harian = $n['praktek_harian'];
                    $praktek_semester = $n['praktek_semester'];
                    $tengah_semester = ($praktek_harian + $praktek_semester) / 2;
                    $tengah_semester_bulat = round($tengah_semester, 0);
                    echo '<td><b>' . $tengah_semester_bulat . '</b></td>';
                    echo '<td>' . $n['praktek_akhir'] . '</td>';
                    echo '<td>' . $n['nilai_akhir'] . '</td>';
                      $praktek_akhir = $n['praktek_akhir'];
                      $nilai_akhir = $n['nilai_akhir'];
                      $rata_rata = ($praktek_harian + $praktek_semester + $praktek_akhir + $nilai_akhir) / 4;
                      if ($rata_rata >= 80) {
                          $keterangan = '<span style="color: green;">Lulus</span>';
                      } else {
                          $keterangan = '<span style="color: red;">Tidak Lulus</span>';
                      }
                    echo '<td>' . $rata_rata . '</td>';
                    echo '<td>' . $keterangan . '</td>';
                    echo '<td>';
                    
                    echo '<a class="badge badge-danger text-white float-right ml-1"  onclick="return confirmSwal(' . $n['id_nilai'] . ')">Hapus</a>';
                    echo '<button class="badge badge-success float-right mt-2" data-toggle="modal" data-target="#nilaiUbahModal' . $n['id_nilai'] . '" data-id="' . $n['id_nilai'] . '">Ubah</button>';
                    echo '</td>';
                    echo '</tr>';
                }
            }

            echo '</tbody>';
            echo '</table>';
          ?>
             <script>
                function confirmSwal(nilaiId) {
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
                window.location.href = "<?=BASE_URL;?>/nilai/hapus/" + nilaiId;
                }
                });
                return false; // Kembalikan false untuk menghentikan tautan dari mengarahkan ke URL secara default
                }
              </script>
      </div>
    </div>
                                <!-- END DATA TABLE-->
  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="nilaiModal" tabindex="-1" role="dialog" aria-labelledby="formModalNilai" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalNilai">Tambah Data Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=BASE_URL;?>/nilai/tambah" method="POST">
          <input type="hidden" name="id_nilai" id="id_nilai">
          <div class="form-group">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas_id" name="kelas_id" onchange="handleFilterChange(this)">
                  <option>Silahkan Pilih!</option>
                  <?php foreach ($data['kelas'] as $k) : ?> 
                  <option value="<?=$k['id_kelas'];?>"><?=$k['nama'];?></option>
                  <?php endforeach;?>
              </select>
          </div>

          <div class="form-group">
              <label for="siswa">Siswa</label>
              <select class="form-control" id="siswa_id" name="siswa_id">
                  <option value="">Silahkan Pilih!</option>
                  <!-- Data siswa akan diisi secara dinamis menggunakan Ajax -->
                  <script>
                    // Fungsi untuk menangani perubahan pemilihan kelas
                    function handleFilterChange(selectElement) {
                        var selectedValue = selectElement.value;

                        // Memastikan nilai terpilih tidak kosong
                        if (selectedValue !== "") {
                            // Memanggil fungsi Ajax untuk mendapatkan siswa berdasarkan kelas yang dipilih
                            $.ajax({
                                url: '<?= BASE_URL; ?>/Nilai/getSiswaByKelasAjax',
                                method: 'POST',
                                data: { kelas_id: selectedValue },
                                dataType: 'json',
                                success: function (data) {
                                    // Mengosongkan dan mengisi ulang dropdown siswa dengan hasil Ajax
                                    $('#siswa_id').empty();
                                    $('#siswa_id').append('<option value="">Silahkan Pilih!</option>');
                                    $.each(data, function (key, value) {
                                        $('#siswa_id').append('<option value="' + value.id_siswa + '">' + value.nama + '</option>');
                                    });
                                },
                                error: function (xhr, status, error) {
                                    // Handle kesalahan jika diperlukan
                                    console.error(error);
                                }
                            });
                        } else {
                            // Jika nilai terpilih kosong, kosongkan dropdown siswa
                            $('#siswa_id').empty();
                            $('#siswa_id').append('<option value="">Silahkan Pilih!</option>');
                        }
                    }
                </script>


              </select>
          </div>

            <div class="form-group">
                <label for="praktek_harian">Praktek Harian</label>
                <input type="number" class="form-control" id="praktek_harian" name="praktek_harian">
            </div>
          <div class="form-group">
              <label for="praktek_semester">Praktek Semester</label>
              <input type="number" class="form-control" id="praktek_semester" name="praktek_semester">
          </div>
          <div class="form-group">
                <label for="praktek_akhir">Praktek Akhir</label>
                <input type="number" class="form-control" id="praktek_akhir" name="praktek_akhir">
          </div>
          <div class="form-group">
                <label for="nilai_akhir">Nilai Akhir</label>
                <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" id="keterangan" name="keterangan">
          </div>  
        <div class="modal-footer">
          <a href="nilai" type="button" class="btn btn-secondary">Close</a>
          <button type="Submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

                  </div>
                  <!-- Modal -->
                  <?php foreach ($data['nilai'] as $n) : ?>
  <div class="modal fade" id="nilaiUbahModal<?=$n['id_nilai'];?>" tabindex="-1" role="dialog" aria-labelledby="formModalNilai" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalNilai">Ubah Data Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=BASE_URL;?>/nilai/ubah" method="POST">
          <input type="hidden" name="id_nilai" id="id_nilai" value="<?=$n['id_nilai'];?>">
          <div class="form-group">
              <label for="kelas">Siswa</label>
              <select class="form-control" id="siswa_id" name="siswa_id" value="<?=$n['siswa_id'];?>" disabled>
                                      <option value="<?=$n['siswa_id'];?>" name="siswa_id" selected>
                                      <?php 
                                                  $siswa_id = $n['siswa_id'];
                                                  foreach ($data['nama'] as $sn)  
                                                  if ($sn['siswa_id'] == $siswa_id) {
                                                    echo $sn['nama'];
                                                  }?>
                  </option>
              </select>
          </div> 
            <div class="form-group">
                <label for="praktek_harian">Praktek Harian</label>
                <input type="number" class="form-control" id="praktek_harian" name="praktek_harian" value="<?=$n['praktek_harian'];?>">
            </div>
          <div class="form-group">
              <label for="praktek_semester">Praktek Semester</label>
              <input type="number" class="form-control" id="praktek_semester" name="praktek_semester" value="<?=$n['praktek_semester'];?>">
          </div>
          <div class="form-group">
                <label for="praktek_akhir">Praktek Akhir</label>
                <input type="number" class="form-control" id="praktek_akhir" name="praktek_akhir" value="<?=$n['praktek_akhir'];?>">
          </div>
          <div class="form-group">
                <label for="nilai_akhir">Nilai Akhir</label>
                <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir" value="<?=$n['nilai_akhir'];?>">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="<?=$n['keterangan'];?>">
          </div>  
        <div class="modal-footer">
          <a href="nilai" type="button" class="btn btn-secondary">Close</a>
          <button type="Submit" class="btn btn-success">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php endforeach;?>
  