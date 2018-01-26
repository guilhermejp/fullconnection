<?php include("head.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Equipamentos
            <small>Adicione, edite e exclua o cadastro de equipamentos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> <?= $client_name ?></a></li>
            <li><a href="<?= base_url('lojas/' . $id_client) ?>"><i class="fa fa-building"></i> <?= $store_name ?> </a></li>
            <li class="active"><a href="<?= base_url('equipamentos/' . $id_store) ?>"><i class="fa fa-cubes"></i> Equipamentos</a></li>
            <li class="active"><a ><i class="fa fa-cube"></i> Cadastrar</a></li>
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
                        <h3 class="box-title"># <?= @$typef . @$id ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" name="form-facilities" id="form-facilities" method="post" action="<?= base_url('equipamentos/' . $id_store . '/salvar'); ?>">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= @$id ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Cliente</label>
                                <input type="hidden" class="form-control" id="id_client" name="id_client" value="<?= $id_client ?>">
                                <input type="text" class="form-control" id="client_name" name="client_name" value="<?= $client_name ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="name">Loja</label>
                                <input type="hidden" class="form-control" id="id_store" name="id_store" value="<?= $id_store ?>">
                                <input type="text" class="form-control" id="store_name" name="store_name" value="<?= $store_name ?>" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="typef" name="typef" value="<?= @$typef ?>">
                                <label for="type">Tipo de Equipamento</label><br>
                                <a class="btn btn-app btn-air-conditioning btn-warning">
                                    <i class="fa fa-snowflake-o"></i> &nbsp; Ar Condicionado &nbsp;
                                </a>
                                <a class="btn btn-app btn-eletrical-panel btn-warning">
                                    <i class="fa fa-bolt"></i> &nbsp; Quadro Elétrico &nbsp; 
                                </a>
                            </div>
                            <div id="div_air_conditioning">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" name="name" value="<?= @$name ?>" placeholder="Nome ou Descrição do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <input type="text" class="form-control" name="type"  value="<?= @$type ?>" placeholder="Tipo de Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Marca</label>
                                    <input type="text" class="form-control" name="brand"  value="<?= @$brand ?>" placeholder="Marca do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input type="text" class="form-control" name="model" value="<?= @$model ?>" placeholder="Modelo do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="site">Localização</label>
                                    <input type="text" class="form-control" name="site" value="<?= @$site ?>" placeholder="Localização Física do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="floor">Andar</label>
                                    <input type="text" class="form-control" name="floor" value="<?= @$floor ?>" placeholder="Andar do Prédio onde encontra-se o Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="sector">Setor que Atende</label>
                                    <input type="text" class="form-control" name="sector" value="<?= @$sector ?>" placeholder="Setor que o Ar Condicionado Atende">
                                </div>
                                <div class="form-group">
                                    <label for="capacity">Capacidade</label>
                                    <input type="text" class="form-control" name="capacity" value="<?= @$capacity ?>" placeholder="Capacidade do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="volts">Tensão (V)</label>
                                    <input type="text" class="form-control" name="volts" value="<?= @$volts ?>" placeholder="Tensão em Volts, Voltagem">
                                </div>
                                <div class="form-group">
                                    <label for="serial_number">Número Serial</label>
                                    <input type="text" class="form-control" name="serial_number" value="<?= @$serial_number ?>" placeholder="Número de Serie do Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="people_sector">Nº de Pessoas do Setor</label>
                                    <input type="text" class="form-control" name="people_sector"  value="<?= @$people_sector ?>" placeholder="Número de pessoas atendidas pelo Ar Condicionado">
                                </div>
                                <div class="form-group">
                                    <label for="square_meter">M² atendidos</label>
                                    <input type="text" class="form-control" name="square_meter" value="<?= @$square_meter ?>" placeholder="Valor de Metros Quadrados atendido pelo Ar Condicionado">
                                </div>
                            </div>
                            <div id="div_eletrical_panel">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" name="name"  value="<?= @$name ?>" placeholder="Nome ou Descrição do Quadro Elétrico">
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <input type="text" class="form-control" name="type"  value="<?= @$type ?>" placeholder="Tipo de Quadro Elétrico">
                                </div>
                                <div class="form-group">
                                    <label for="switch">Disjuntor de Entrada</label>
                                    <input type="text" class="form-control" name="switch"  value="<?= @$switch ?>" placeholder="Disjuntor de Entrada">
                                </div>
                                <div class="form-group">
                                    <label for="site">Localização</label>
                                    <input type="text" class="form-control" name="site"  value="<?= @$site ?>" placeholder="Localização do Quadro Elétrico">
                                </div>
                                <div class="form-group">
                                    <label for="floor">Andar</label>
                                    <input type="text" class="form-control" name="floor"  value="<?= @$floor ?>" placeholder="Andar do Prédio onde encontra-se o Quadro Elétrico">
                                </div>
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

        $('#div_air_conditioning').hide();
        $('#div_air_conditioning :input').attr('disabled', 'disabled');
        $('#div_eletrical_panel').hide();
        $('#div_eletrical_panel :input').attr('disabled', 'disabled');

        $('.btn-air-conditioning').click(function () {
            $('#div_eletrical_panel :input').attr('disabled', 'disabled');
            $('#div_air_conditioning :input').removeAttr('disabled');
            $('.btn-eletrical-panel').removeClass('active');
            $(this).addClass('active');
            $('#div_eletrical_panel').hide();
            $('#div_air_conditioning').show();
            $('#typef').val("A");
        });

        $('.btn-eletrical-panel').click(function () {
            $('#div_eletrical_panel :input').removeAttr('disabled');
            $('#div_air_conditioning :input').attr('disabled', 'disabled');
            $('.btn-air-conditioning').removeClass('active');
            $(this).addClass('active');
            $('#div_air_conditioning').hide();
            $('#div_eletrical_panel').show();
            $('#typef').val("Q");
        });

        $('.excluir').click(function () {
            $('#modal-confirm-danger .modal-title').text("Excluir");
            $('#modal-confirm-danger .modal-body').text('Deseja realmente excluir este Equipamento?');
            $('#modal-confirm-danger').modal({
                backdrop: true,
                keyboard: true
            })
                    .one('click', '.yes', function (e) {
                        $('#form-facilities').attr('action', '<?= base_url('equipamentos/excluir/'); ?>')
                                .submit();
                    });

            return false;

        });

        $('.new').click(function () {
            document.location.href = "<?= base_url('equipamentos/' . $id_store . '/cadastrar'); ?>";
            return false;
        });

        if ($("#typef").val() == "A") {
            $('.btn-eletrical-panel').hide();
            $('.btn-air-conditioning').trigger('click');
        } else if ($("#typef").val() == "Q") {
            $('.btn-eletrical-panel').trigger('click');
            $('.btn-air-conditioning').hide();
        }

    });
</script>
</body>
</html>