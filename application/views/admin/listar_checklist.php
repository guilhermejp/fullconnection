<?php include("head.php"); ?>
<div class="modal  fade" id="dialog-open-files">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Documentos</h4>
            </div>
            <div class="modal-body">
                <p><b>CHECKLIST</b></p>
                <ul id="ul_checklist">
                </ul>
                <p><b>COMPROVANTES</b></p>
                <ul id="ul_comprovantes">
                </ul>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
    <form action="" method="post" name="form-checklist" id="form-checklist">
        <input type="hidden" name="id" id="id">
    </form>
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
                                    <th>OS</th>
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
                                        echo "<td>" . $value[5] . "</td>";
                                        if ($value[6] == "0") {
                                            echo '<td><span class="label label-warning">Pendente Aprovação</span></td>';
                                        } elseif ($value[6] == "1") {
                                            echo '<td><span class="label label-success">Aprovado pelo Gerente</span></td>';
                                        } else {
                                            echo '<td><span class="label">Erro status</span></td>';
                                        }
                                        echo "<td>" . $value[7] . "</td>";
                                        echo "<td>";
                                        echo '<a href="javascript:void(0);" onclick="javascript:open_files(\'' . $value[0] . '\');"><span class="label label-default"><i class="fa fa-folder-open-o"></i> &nbsp; Abrir</span></a> ';
                                        if ($value[6] == "0") {
                                            echo '<a href="javascript:void(0);" onclick="javascript:resend(\'' . @$value[0] . '\'); "><span class="label label-default"><i class="fa fa-envelope-o"></i> &nbsp; Reenviar p/ Gerente</span></a> ';
                                        }
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
                                    <th>OS</th>
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

        var table = $('#datatable_checklists').DataTable({
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
    });

    /* Buttons */
    function resend(id) {
        $('#id').val(id);
        $('#modal-confirm-info .modal-title').text("Reenviar");
        $('#modal-confirm-info .modal-body').text('Deseja reenviar a solicitação de aprovação para o Gerente?');
        $('#modal-confirm-info').modal({
            backdrop: true,
            keyboard: true
        })
                .one('click', '.yes', function (e) {
                    $('#form-checklist').attr('action', '<?= base_url('checklists/reenviar'); ?>')
                            .submit();
                });
        return false;
    }

    function open_files(id) {
        $('#id').val(id);
        ajax('checklists/comprovantes', $('#form-checklist'), "return_files");
    }

    function return_files(result) {

        $('#ul_checklist').html("");
        $('#ul_checklist').html("<li><a href=\""+ result.checklist+"\" target=\"_blank\">Acessar Checklist</a></li>");

        $('#ul_comprovantes').html("");
        $.each(result.receipts, function (i, item) {    
            $('#ul_comprovantes').append("<li><a href=\""+ item +"\" target=\"_blank\">Comprovante "+i+"</a></li>");
        });
        
        $('#dialog-open-files').modal({
            backdrop: true,
            keyboard: true
        });
        
    }
</script>
</body>
</html>