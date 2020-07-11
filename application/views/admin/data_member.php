<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Data Member</li>
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
          <h3 class="card-title">Data Member</h3>

          <div class="card-tools">
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
                            <td>Email</td>
                            <td>Password</td>
                            <td>Nama</td>
                            <td>Telepon</td>
                            <td>Alamat</td>
                            <td>KTP</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($member as $row) {
                        ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $row->email;?></td>
                            <td><?= $row->password;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->telepon;?></td>
                            <td><?= $row->alamat;?></td>
                            <td><?= $row->ktp;?></td>
                        </tr>
                        <?php }?>
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