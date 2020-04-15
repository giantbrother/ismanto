<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Tujuan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('transjakarta/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Register</label>

                      <div class="col-sm-9">
                        <input type="text" name="id" value="<?php echo getid('transjakarta','id'); ?>"  class="form-control" >
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">pnp</label>

                      <div class="col-sm-9">
                        <input type="text" name="pnp" class="form-control" placeholder="Masukkan Jumlah Penumpang">
                      </div>
                  </div>


				          <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal</label>

                      <div class="col-sm-9">
                        <input type="date" name="tanggal" class="form-control" placeholder="Masukan Tanggal">
                      </div>
                  </div>
				  
				  	

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('transjakarta', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
                      </div>
                  </div>

                </div>
                <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>