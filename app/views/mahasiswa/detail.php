<div class="container mt-4">
<div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $data['mhs']['nama'] ?></h5>
      <p class="card-text"><?php echo $data['mhs']['email'] ?></p>
      <p class="card-text"><?php echo $data['mhs']['jurusan'] ?></p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
     <a href="<?= BASEURL; ?>/mahasiswa" class='card-link'>Kembali</a>
    </div>
  </div>
</div>