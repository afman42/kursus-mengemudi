<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Ubah Data Paket</li>
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
          <h3 class="card-title">Ubah Data Paket</h3>

          <div class="card-tools">
            
            <!-- <a href="<?php echo site_url('admin/tambah_data_paket');?>" class="btn btn-info"><i class="fas fa-plus"></i></a> -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <form action="<?php site_url('admin/edit_data_paket/'.$paket->id_paket);?>" method="post">
                    <input type="hidden" name="id_paket" value="<?= $paket->id_paket; ?>">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?= $paket->nama; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="pertemuan" class="form-control" placeholder="Masukan Pertemuan" value="<?= $paket->pertemuan; ?>">
                        <?= form_error('pertemuan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="biaya" class="form-control" placeholder="Masukan biaya" value="<?= $paket->biaya; ?>">
                        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan" value="<?= $paket->keterangan; ?>">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-info" value="Ubah">
                    </div>
                </form>
              </div>
          </div>
        </div>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>