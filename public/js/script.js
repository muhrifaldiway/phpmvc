$(function(){

    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/tambah');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val('');
                $('#nrp').val('');
                $('#email').val('');
                $('#jurusan').val('');
                $('#id').val('');
            }
        });

    });


    $('.tampilModalUbah').on('click', function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });


}); 

function isiFormUbah(id_kelas, nama_kelas) {
  document.getElementById('id_kelas').value = id_kelas;
  document.getElementById('nama').value = nama_kelas;

  // Ganti action formulir menjadi URL yang sesuai untuk "Ubah"
  document.getElementById('ubah-form').action = '<?=BASE_URL;?>/kelas/ubah/' + id_kelas;
}

function kirimDataUbah() {
  const id_kelas = document.getElementById('id_kelas').value;
  const nama_kelas = document.getElementById('nama').value;

  fetch('<?=BASE_URL;?>/kelas/ubah/' + id_kelas, {
    method: 'POST',
    body: JSON.stringify({ id_kelas, nama_kelas }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    // Lakukan sesuatu dengan respons dari server jika diperlukan
    console.log(data);
  })
  .catch(error => {
    console.error('Gagal mengirim data: ' + error);
  });
}


