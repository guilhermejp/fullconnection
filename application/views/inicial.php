<?php
/*
 * author: Guilherme Silva
 * description: Formulário Checklist pra Assistência Técnica da FullConnection
 * email: guilherme@gcoder.com.br
 */
header("Content-type: text/html; charset=utf-8");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Checklist</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('assets/themes/fullconnection.min.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/themes/jquery.mobile.icons.min.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/jquery.mobile.structure-1.4.5.min.css') ?>" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css?v=2') ?>" />
        <script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.mobile-1.4.5.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/ajax.js') ?>"></script>
        <script src="<?= base_url('assets/js/cookies.js') ?>"></script>
    </head>
    <?php
    /*
     * Cada seção de tela do jQuery Mobile é criada dentro da div: <div data-role="page" data-theme="a" id="xxx">
     * Dentro desta div é separada a div header, content e footer
     * A header é padrão para todas as telas e é importada do header.php
     * O content e footer para cada página é variável e é importado logo abaixo do header
     */
    ?>
    <body>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_1">
            <form id="form-inicial" action="inicial" method="post" data-ajax="false">
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 1
                ?>
                <div data-role="content" data-theme="a">
                    <!--<div class="header"><h3>IDENTIFICAÇÃO</h3></div>-->
                    <div>
                        <div style="padding-right: 5px;">
                            Cliente<br>
                            <!--<input type="hidden" name="cliente" value="">-->
                            <select id="cliente" name="cliente">
                                <option value="">Selecione um Cliente</option>
                                <?php
                                foreach ($clients as $value) {
                                    echo "<option value=\"" . $value->id . "\">" . $value->name . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            Loja<br>
                            <!--<input type="hidden" name="cidade" value="">-->
                            <select id="cidade" name="cidade">
                                <option value="">Selecione uma Loja</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div>
                            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r submit" href="#">Iniciar Checklist</a>
                        </div>
                    </div><!-- /grid-a -->
                </div>
            </form>
        </div>
    </body>
    <div class="carregando">
        <center>
            <img src="<?= base_url('assets/themes/images/ajax-loader.gif') ?>" height="50px"><br>
            <p><img src="<?= base_url('assets/images/fulllogo2.png') ?>" height="50px"></p>
            <p>Processando informações, aguarde...</p>
        </center>
    </div>

    <div class="carregando_img">
        <center>
            <img src="<?= base_url('assets/themes/images/ajax-loader.gif') ?>" height="50px"><br>
            <p><img src="<?= base_url('assets/images/fulllogo2.png') ?>" height="50px"></p>
            <p>Carregando imagem, aguarde...</p>
        </center>
    </div>
    <script>
        $(document).ready(function () {
            // Limpar Fomulários
            $('form').each(function () {
                $(this)[0].reset();
            });

            $('.submit').click(function () {
                if ($("#cliente").val() != "" && $("#cidade").val() != "") {
                    $('#form-inicial').submit();
                }else{
                    alert("Selecioe um Cliente e  Loja para continuar!");
                }
            });

            $('#cliente').change(function () {
                ajax('form/load_stores', $('#form-inicial'), "carrega_lojas");
            });

        });

        // Sucesso ao chamar a função de salvar os campos do formulário
        function save_field(result) {
            if (result.retorno == true) {
                return false;
            } else {
                alert("Erro ao gravar o formuário automático, entre em contato com o suporte técnico!");
            }

        }
        // Erro ao chamar a função de salvar os campos do formulário
        function save_field_erro() {
            alert("Atenção, você está SEM CONEXÃO COM A INTERNET!\nNão feche o browser para não perder os dados já digitados, tente reestabelecer a conexão!");
            conectado = 0;
            return false;
        }

        function carrega_lojas(retorno) {
            html = '<option value="">Selecione uma Loja</option>';
            $.each(retorno, function (i, item) {
                html += '<option value="' + item[0] + '">' + item[1] + '</option>';
            });
            $('#cidade').html(html);

        }

    </script>
</html>