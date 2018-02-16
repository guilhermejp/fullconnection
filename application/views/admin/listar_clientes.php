<?php include("head.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clientes
            <small>Cadastre, pesquise, edite e remova os clientes desejados</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> Clientes</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <form role="form" name="form-client" id="form-client" method="post" action="">
        <input type="hidden" name="id" id="id">
    </form>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <a href="<?= base_url('clientes/cadastrar') ?>" class="btn btn-sm btn-default"><i class="fa fa-user-o"></i> &nbsp; Cadastrar Novo Cliente</a>
                    </div>
                    <div class="box-body">
                        <table id="datatable_clients" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Logomarca</th>
                                    <!--<th>ID</th>-->
                                    <th>Nome</th>
                                    <th>Total de Lojas</th>
                                    <th>Total de Equipamentos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($data)) {
                                    foreach ($data as $value) {
                                        echo "<tr>";
                                        echo "<td><div align=\"center\"><img src=\"" . base_url($value[4]) . "\" height=\"40\"></div></td>";
                                        //echo "<td>" . $value[0] . "</td>";
                                        echo "<td>" . $value[1] . "</td>";
                                        echo "<td>" . $value[2] . "</td>";
                                        echo "<td>" . $value[3] . "</td>";
                                        echo "<td>";
                                        echo '<a href="' . base_url('lojas/') . $value[0] . '"><span class="label label-default"><i class="fa fa-building"></i> &nbsp; Acessar Lojas</span></a> ' .
                                        '<a href="' . base_url('clientes/editar/') . $value[0] . '"><span class="label label-info"><i class="fa fa-pencil-square-o"></i> &nbsp; Editar</span></a> ' .
                                        '<a href="javascript:void(0);" onclick="javascript:deletar(this);" codigo="' . $value[0] . '" nome="' . $value[1] . '"><span class="label label-danger"><i class="fa fa-times"></i> &nbsp; Excluir</span></a> ';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Logomarca</th>
                                    <!--<th>ID</th>-->
                                    <th>Nome</th>
                                    <th>Total de Lojas</th>
                                    <th>Total de Equipamentos</th>
                                    <th>Ações</th>
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

<?php include("msg_default.php") ?>

        $('#datatable_clients').DataTable({
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
                },
                "decimal": ",",
                "thousands": "."
            }
        });
    });

    function deletar(campo){
        $('#id').val($(campo).attr('codigo'));
            $('#modal-confirm-danger .modal-title').text("Excluir");
            $('#modal-confirm-danger .modal-body').text('Deseja realmente excluir o cliente # ' + $(campo).attr('codigo') + ' - ' + $(campo).attr('nome') + ' ?');
            $('#modal-confirm-danger').modal({
                backdrop: true,
                keyboard: true
            })
                    .one('click', '.yes', function (e) {
                        $('#form-client').attr('action', '<?= base_url('clientes/excluir'); ?>')
                                .submit();
                    });
            return false;
    }
</script>
</body>
</html>