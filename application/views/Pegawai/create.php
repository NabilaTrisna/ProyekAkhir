<?php $this->load->view('layouts/base_start') ?>
<br>
<br>
<div class="container">
  <legend>Tambah Data Pegawai</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('pegawai/input'); ?>

    <div class="form-group">
      <label for="Nama">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
    </div>

    <div class="form-group">
      <label for="Nama">Tanggal Lahir </label>
      <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan Tanggal Lahir">
    </div>

     <div class="form-group">
      <label for="alamat">Alamat </label>
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Tanggal Lahir">
    </div>

      <div class="form-group">
      <label for="kontak">NO HP </label>
      <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan NO Hp">
    </div>

    <div class="form-group">
      <label for="mail">E-mail </label>
      <input type="text" class="form-control" id="mail" name="mail" placeholder="Masukkan E-mail">
    </div>

     <div class="form-group">
    <label>Divisi </label>
                  <select class="form-control" name="divisi" id="divisi">
                  <option selected> -- Pilih Divisi -- </option>
                  <?php foreach($data as $divisi){ ?>
                  <option value="<?php echo $divisi->id_divisi; ?>"><?php echo $divisi->nama; ?>   </option>
                  <?php } ?>
                  </select>
    </div>
    

    <a class="btn btn-info" href="<?php echo base_url('pegawai/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close() ?>
  </div>
</div>