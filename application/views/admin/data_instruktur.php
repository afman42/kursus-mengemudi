<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Instruktur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Data Instruktur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Instruktur</h3>

          <div class="card-tools">
            
            <a href="<?php echo site_url('admin/tambah_data_instruktur');?>" class="btn btn-info"><i class="fas fa-plus"></i></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
              <table id="barang" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama</td>
                            <td>Pengalaman</td>
                            <td>Rating</td>
                            <td>Foto</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($instruktur as $row) {
                        ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->pengalaman;?></td>
                            <td><?= $row->rating;?></td>
                            <td><img src="<?php alamat_website();?><?=$row->foto ?>" width="100" height="100"></td>
                            <td><a href="<?= site_url('admin/edit_data_instruktur/'.$row->id_instruktur);?>" class="btn btn-sm btn-primary">Edit</a> &nbsp; <a href="<?= site_url('admin/hapus_data_instruktur/'.$row->id_instruktur);?>" class="btn btn-sm btn-danger">Hapus</a></td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>