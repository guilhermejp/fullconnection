<?php include("head.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cliente
            <small>Adicione, edite e exclua o cadastro do cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> Clientes</a></li>
            <li class="active"><a href="<?= base_url('clientes/cadastrar') ?>"><i class="fa fa-user-o"></i> Cadastrar</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= @is_numeric($id) ? "# " . $id : ""; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="form-client" id="form-client" method="post" action="<?= base_url('clientes/salvar'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?= @$id; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Cliente" required="required" value="<?= @$name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="fc_manager_email">Email do Gerente da Conta <h6><i class="fa fa-exclamation-circle text-yellow"></i> &nbsp; O gerente da conta receberá alertas por e-mail referente ao cliente</h6></label>
                                <input type="email" class="form-control" id="fc_manager_email" name="fc_manager_email" placeholder="email@fullconnection.com.br" required="required" value="<?= @$fc_manager_email; ?>">
                            </div>
                            <input type="hidden" name="logo_temp" value="<?= @$logo; ?>">
                            <div class="form-group">
                                <label for="logomarca">Logomarca
                                    <h6><i class="fa fa-exclamation-circle text-yellow"></i> &nbsp; Tamanho máximo da imagem 2MB. Permitido [JPG / BMP / PNG / GIF].</h6>
                                </label>
                                <input type="file" id="logo" name="logo">
                            </div>
                            <img src="<?= base_url(@$logo); ?>" height="100px;" alt="">
                            <br>
                            <div class="form-group">
                                <input type="checkbox" id="temp_only_ar" name="temp_only_ar" value="1" <?=(@$temp_only_ar == "1")? "checked=checked":""; ?>>
                                &nbsp; &nbsp;
                                <label for="temp_only_ar">Apenas checklist de Ar Condicionado?</label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <?php if ($functions['save']) { ?>
                                <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-default" disabled="disabled">Salvar</button>
                            <?php } if ($functions['delete']) { ?>
                                <button class="btn btn-sm btn-warning excluir">Excluir</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-default" disabled="disabled">Excluir</button>
                            <?php } if ($functions['new']) { ?>
                                <button class="btn btn-sm btn-info new">Novo</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-default" disabled="disabled">Novo</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
                <!-- /.box --> 
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->

<?php include("footer.php"); ?>

<script>
    $(function () {

<?php include("msg_default.php") ?>

        $('#name').focus();

        $('.excluir').click(function () {
            $('#modal-confirm-danger .modal-title').text("Excluir");
            $('#modal-confirm-danger .modal-body').text('Deseja realmente excluir este cliente ?');
            $('#modal-confirm-danger').modal({
                backdrop: true,
                keyboard: true
            })
                    .one('click', '.yes', function (e) {
                        $('#form-client').attr('action', '<?= base_url('clientes/excluir/'); ?>');
                        $('#form-client').submit();
                    });

            return false;

        });

        $('.new').click(function () {
            document.location.href = "<?= base_url('clientes/cadastrar'); ?>";
            return false;
        });
    });
</script>
</body>
</html>