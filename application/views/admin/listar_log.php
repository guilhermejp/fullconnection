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
            <li class="active"><a href="<?=base_url('clientes')?>"><i class="fa fa-users"></i> Clientes</a></li>
            <li class="active"><a href="<?=base_url('lojas')?>"><i class="fa fa-building-o"></i> Lojas</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <button type="button" class="btn btn-sm btn-default"><i class="fa fa-building-o"></i> &nbsp; Adicionar Loja</button>
                    </div>
                    <div class="box-body">
                        <table id="datatable_checklists" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Programa</th>
                                    <th>Usuário</th>
                                    <th>Evento</th>
                                    <th>Erro</th>
                                    <th>Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>18/01/2018 10:13:12</td>
                                    <td>User</td>
                                    <td>admin</td>
                                    <td>acesso ao sistema</td>
                                    <td>OK</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>18/01/2018 10:15:22</td>
                                    <td>Checklists</td>
                                    <td>admin</td>
                                    <td>reenviar e-mail para gerente</td>
                                    <td>SMTP not configured.</td>
                                    <td>email: gerente1@nike.com.br<br>smtp: smtp.fullconnection.com.br<br>port: 587<br>from: noreply@fullconnection.com.br</td>
                                </tr>
                                <tr>
                                    <td>18/01/2018 10:22:12</td>
                                    <td>Formulario Checklist</td>
                                    <td>técnico</td>
                                    <td>acesso inicial ao formulário</td>
                                    <td>OK</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>18/01/2018 10:58:32</td>
                                    <td>Formulario Checklist</td>
                                    <td>técnico</td>
                                    <td>upload fotos</td>
                                    <td>OK</td>
                                    <td>name: img01.jpg<br>size: 1.5mb</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Programa</th>
                                    <th>Usuário</th>
                                    <th>Evento</th>
                                    <th>Erro</th>
                                    <th>Detalhes</th>
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
            }
        });
    });
</script>
</body>
</html>