$(function(){
    $('.tombolTambahData').on('click',function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $(".modal-footer button[type=submit]").html('Tambah Data');
    })
 
    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $(".modal-footer button[type=submit]").html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpMvC/public/mahasiswa/ubah');
        const id = $(this).data('id');
          // menjalankan ajax
          // console.log(id);
          // id kiri  data yg dikirimkan | id kanan data dapat dari variabel
        $.ajax({
            url: 'http://localhost/phpMvC/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                // console.log(data);
                // console.log(data[nama]);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });


});