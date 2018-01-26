<?php include("head.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Checklists
            <small>Pesquise, imprima e reenvie para o gerente os checklists desejados</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a><i class="fa fa-files-o"></i> Checklists</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <!--<div class="box-header">
                        <p><small><button>INSTRUÇÕES DA TELA</button></small></p>
                    </div>-->
                    <div class="box-body">
                        <table id="datatable_checklists" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cadastro</th>
                                    <th>Cliente</th>
                                    <th>Loja</th>
                                    <th>Técnicos</th>
                                    <th>Situação</th>
                                    <th>Atualização</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (is_array(@$data)) {
                                    foreach (@$data as $value) {
                                        echo "<tr>";
                                        echo "<td>" . $value[0] . "</td>";
                                        echo "<td>" . $value[1] . "</td>";
                                        echo "<td>" . $value[2] . "</td>";
                                        echo "<td>" . $value[3] . "</td>";
                                        echo "<td>" . $value[4] . "</td>";
                                        if($value[5] == "0"){
                                            echo '<td><span class="label label-warning">Pendente Aprovação</span></td>';
                                        }elseif($value[5] == "1"){
                                            echo '<td><span class="label label-success">Aprovado pelo Gerente</span></td>';
                                        }else{
                                            echo '<td><span class="label">Erro status</span></td>';
                                        }
                                        echo "<td>" . $value[6] . "</td>";
                                        echo "<td>";
                                        echo '<a href="'.base_url($value[7]).'" target="_blank"><span class="label label-default"><i class="fa fa-folder-open-o"></i> &nbsp; Abrir</span></a> ' .
                                        '<a href="javascript:void(0);" class="resend"><span class="label label-default"><i class="fa fa-envelope-o"></i> &nbsp; Reenviar p/ Gerente</span></a> ';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Data Cadastro</th>
                                    <th>Cliente</th>
                                    <th>Loja</th>
                                    <th>Técnicos</th>
                                    <th>Situação</th>
                                    <th>Atualização</th>
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
            }
        });
        
        /* Buttons */
        $('.resend').click(function () {
            //$('#id').val($(this).attr('codigo'));
            $('#modal-confirm-info .modal-title').text("Reenviar");
            $('#modal-confirm-info .modal-body').text('Deseja reenviar o checklist para o Cliente?');
            $('#modal-confirm-info').modal({
                backdrop: true,
                keyboard: true
            })
                    .one('click', '.yes', function (e) {
                        $('#form-client').attr('action', '<?= base_url('checklists/excluir'); ?>')
                                .submit();
                    });
            return false;
        });
        
    });
</script>
</body>
</html>