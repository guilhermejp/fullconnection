<?php include("head.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Loja
            <small>Adicione, edite e exclua o cadastro do cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> <?= $client_name ?></a></li>
            <li><a href="<?= base_url('lojas/' . $id_client) ?>"><i class="fa fa-building"></i> Lojas </a></li>
            <li class="active"><a><i class="fa fa-building-o"></i> Cadastrar</a></li>
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
                        <h3 class="box-title"># <?= @$id ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="form-stores" id="form-stores" method="post" action="<?= base_url('lojas/' . $id_client . '/salvar'); ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= @$id ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="client">Cliente</label>
                                <input type="hidden" class="form-control" id="id_client" name="id_client" value="<?= $id_client ?>">
                                <input type="text" class="form-control" id="client_name" name="client_name" value="<?= @$client_name ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="name">Nome da Loja</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= @$name ?>" placeholder="Nome ou descrição da loja" required="required">
                            </div>
                            <div class="form-group">
                                <label for="manager_name">Nome do Gerente da Loja</label>
                                <input type="text" class="form-control" id="manager_name" name="manager_name" value="<?= @$manager_name ?>" placeholder="Nome do Gerente ou Responsável pela Loja no cliente"  required="required">
                            </div>
                            <div class="form-group">
                                <label for="manager_email">Email do Gerente da Loja <h6><i class="fa fa-exclamation-circle text-yellow"></i> &nbsp; A aprovação do Checklist será enviada para esta conta de e-mail</h6></label>
                                <input type="email" class="form-control" id="manager_email" name="manager_email" value="<?= @$manager_email ?>" placeholder="email@cliente.com.br" required="required">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <?php if ($functions['save']) { ?>
                                <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-default" disabled="disabled">Salvar</button>
                            <?php } if ($functions['delete']) { ?>
                                <button class="btn btn-sm btn-warning excluir" onclick="javascript:excluir();">Excluir</button>
                            <?php } else { ?>
                                <button class="btn btn-sm btn-default" disabled="disabled">Excluir</button>
                            <?php } if ($functions['new']) { ?>
                                <button class="btn btn-sm btn-info new" onclick="javascript:novo();">Novo</button>
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
            return false;
            gjps
        });

        $('.new').click(function () {
            return false;
        });
    });

    function excluir() {
        $('#modal-confirm-danger .modal-title').text("Excluir");
        $('#modal-confirm-danger .modal-body').text('Deseja realmente excluir esta Loja?');
        $('#modal-confirm-danger').modal({
            backdrop: true,
            keyboard: true
        })
                .one('click', '.yes', function (e) {
                    $('#form-stores').attr('action', '<?= base_url('lojas/excluir/'); ?>');
                    $('#form-stores').submit();
                });

        return false;
    }

    function novo() {
        document.location.href = "<?= base_url('lojas/' . $id_client . '/cadastrar'); ?>";
        return false;
    }
</script>
</body>
</html>