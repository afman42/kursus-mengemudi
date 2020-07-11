<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Mobil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Tambah Data Mobil</li>
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
          <h3 class="card-title">Tambah Data Mobil</h3>

          <div class="card-tools">
            
            <!-- <a href= class="btn btn-info"><i class="fas fa-plus"></i></a> -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <?php if (isset($error)) {
          echo $error;
        }?>
          <div class="row">
              <div class="col-md-12">
                <?php echo form_open_multipart('admin/tambah_data_mobil');?>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="transmisi" class="form-control" placeholder="Masukan Transmisi">
                        <?= form_error('transmisi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-danger" value="Simpan">
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