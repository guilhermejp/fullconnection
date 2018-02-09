<?php include("head.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LOG
            <small>Histórico de eventos do sistema, consulte acessos, erros, e-mail, etc.</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> Clientes</a></li>
            <li class="active"><a href="<?= base_url('lojas') ?>"><i class="fa fa-building-o"></i> Lojas</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <form method="post" name="form-log" id="form-log">
                        <div class="box-header">
                            <p><b>Selecione a data que deseja visualizar o Log</b></p>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="date" name="date" value="<?= @$date ?>">
                            </div>
                        </div>
                    </form>
                    <div class="box-body">
                        <table id="datatable_checklists" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Tipo</th>
                                    <th>Mensagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array(@$log)) {
                                    foreach ($log as $value) {
                                        ?>
                                        <tr>
                                            <td><?= $value['date'] ?></td>
                                            <td><?= $value['type'] ?></td>
                                            <td><?= $value['message'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Tipo</th>
                                    <th>Mensagem</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include("footer.php"); ?>

<script>
    $(function () {

        $('#datatable_checklists').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "order": [[0, "desc"]]
        });

        $('#date').datepicker({format: 'dd/mm/yyyy'});

        $('#date').change(function () {
            var date = $(this).val();
            var newdate = date.split("/").reverse().join("-");
            document.location.href = '<?= base_url('log/') ?>' + newdate;
        });

    });

</script>
</body>
</html>