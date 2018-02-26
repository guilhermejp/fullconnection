<?php include("head.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lojas
            <small>Cadastre, pesquise, edite e remova as lojas desejadas</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?= base_url('clientes') ?>"><i class="fa fa-users"></i> <?= @$client_name ?></a></li>
            <li class="active"><a href="<?= base_url('lojas/'.$id_client) ?>"><i class="fa fa-building"></i> Lojas</a></li>
        </ol>
    </section>

    <form role="form" name="form-stores" id="form-stores" method="post" action="<?= base_url('lojas/' . $id_client . '/salvar'); ?>" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id" name="id" value="<?= @$id ?>">
        <input type="hidden" class="form-control" id="id_client" name="id_client" value="<?= @$id_client ?>">
    </form>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <a href="<?= base_url('lojas/' . $id_client . '/cadastrar') ?>"  class="btn btn-sm btn-default"><i class="fa fa-building-o"></i> &nbsp; Cadastrar Nova Loja</a>
                    </div>
                    <div class="box-body">
                        <table id="datatable_stores" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Loja</th>
                                    <th>Gerente</th>
                                    <th>Total de Equipamentos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array($data)) {
                                    foreach ($data as $value) {
                                        echo "<tr>";
                                        echo "<td>" . $value[1] . "</td>";
                                        echo "<td>" . $value[2] . "</td>";
                                        echo "<td>" . $value[3] . "</td>";
                                        echo "<td>" . $value[4] . "</td>";
                                        echo "<td>";
                                        echo '<a href="' . base_url('equipamentos/') . $value[0] . '"><span class="label label-default"><i class="fa fa-cubes"></i> &nbsp; Acessar Equipamentos</span></a> ' .
                                        '<a href="' . base_url('lojas/' . $id_client . '/editar/') . $value[0] . '"><span class="label label-info"><i class="fa fa-pencil-square-o"></i> &nbsp; Editar</span></a> ' .
                                        '<a href="javascript:void(0);" onclick="javascript:deletar(this);" codigo="' . $value[0] . '" nome="' . $value[2] . '"><span class="label label-danger"><i class="fa fa-times"></i> &nbsp; Excluir</span></a> ';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Loja</th>
                                    <th>Gerente</th>
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

        $('#datatable_stores').DataTable({
            responsive: true,
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
            $('#modal-confirm-danger .modal-body').text('Deseja realmente excluir a loja # ' + $(campo).attr('codigo') + ' - ' + $(campo).attr('nome') + ' ?');
            $('#modal-confirm-danger').modal({
                backdrop: true,
                keyboard: true
            })
                    .one('click', '.yes', function (e) {
                        $('#form-stores').attr('action', '<?= base_url('lojas/excluir'); ?>')
                                .submit();
                    });
            return false;
    }
</script>
</body>
</html>