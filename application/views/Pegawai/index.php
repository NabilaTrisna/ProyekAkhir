<?php $this->load->view('layouts/base_start') ?>
<br>
<br>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">


<div class="container">
<?php if (isset($results)) { ?>
  <legend>Daftar Pegawai</legend>
  
    <table class="table table-striped">

    <a class="btn btn-primary" href="<?php echo base_url('pegawai/tambah') ?>">
            Tambah
    </a>
      <thead>      
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Kontak</th>
        <th>E-mail</th>
        <th>Divisi</th>
        <th>Action</th>
        <th>
          
          </a>
        </th>
      </thead>
      <tbody>
        <?php $number=1; foreach ($results as $data) { ?>
        <tr>
        <td> <?php echo $number++; ?>    
        <td><a href="<?php echo base_url('pegawai/show/'.$data->NIK) ?>"> <?php echo $data->nama ?></td>
        <td><?php echo $data->tanggal_lahir ?></td>
        <td><?php echo $data->alamat ?></td>
        <td><?php echo $data->no_hp ?></td>
        <td><?php echo $data->email ?></td>
        <td>
            <?php 
            foreach($namaDivisi as $ND) 
            {
              if ($ND->id_divisi == $data->divisi)
              {
                
                echo $ND->nama;
              }
            }?>
        </td>
        <td>
        <?php echo form_open('pegawai/hapus/'.$data->NIK)  ?>
            <a class="btn btn-info" href="<?php echo base_url('pegawai/edit/'.$data->NIK) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
        </td>    
        </tr>
        <?php } ?>
    </tbody>
    </table>
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
</div>

<?php $this->load->view('layouts/base_end') ?>