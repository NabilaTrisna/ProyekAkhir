<!-- pegawai/edit.php -->

<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Update Data Pegawai</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('pegawai/update/'.$data->NIK); ?>
    <?php echo form_hidden('NIK', $data->NIK) ?>

    <div class="form-group">
      <label for="Nama">Nama Pegawai</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" 
      value="<?php echo $data->nama ?>">
    </div>

      <div class="form-group">
      <label for="tl">Tanggal Lahir</label>
      <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan Nama" 
      value="<?php echo $data->tanggal_lahir ?>">
    </div>

     <div class="form-group">
      <label for="Nama">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Nama" 
      value="<?php echo $data->alamat ?>">
    </div>

    <div class="form-group">
      <label for="Nama">Kontak</label>
      <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukkan Nama" 
      value="<?php echo $data->no_hp ?>">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Nama" 
      value="<?php echo $data->email ?>">
    </div>

    
    <div class="form-group">
    <label>Divisi </label>
                  <select class="form-control" name="divisi" id="divisi">
                  <option selected> 
                  <?php 
                    foreach($namaDivisi as $ND) 
                    {
                      if ($ND->id_divisi == $data->divisi)
                      {
                        echo $ND->nama;
                      }
                    }?>                  
                  </option>
                  <?php foreach($namaDivisi as $d){ ?>
                  <option value="<?php echo $d->id_divisi; ?>"><?php echo $d->nama; ?>   </option>
                  <?php } ?>
                  </select>
    </div>

    <?php echo $error ?>

    <a class="btn btn-info" href="<?php echo base_url('pegawai/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>