<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Tujuan Bus AKAP</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('tujuan/edit', 'role="form" class="form-horizontal"');
                echo form_hidden('id_tujuan', $tujuan['id_tujuan']);
            ?>

                <div class="box-body">


				  
				 <div class="form-group">
                      <label class="col-sm-2 control-label">Provinsi</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $tujuan['provinsi']; ?>" name="provinsi" class="form-control" placeholder="Masukkan Provinsi">
                      </div>
                  </div>
				  
				  <div class="form-group">
                      <label class="col-sm-2 control-label">Tujuan</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $tujuan['tujuan']; ?>" name="tujuan" class="form-control" placeholder="Masukkan Tujuan">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kawasan</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $tujuan['kawasan']; ?>" name="kawasan" class="form-control" placeholder="Masukkan Kawasan">
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('tujuan', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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