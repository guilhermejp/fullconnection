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
    </head>
    <?php
    /*
     * Cada seção de tela do jQuery Mobile é criada dentro da div: <div data-role="page" data-theme="a" id="xxx">
     * Dentro desta div é separada a div header, content e footer
     * A header é padrão para todas as telas e é importada do header.php
     * O content e footer para cada página é variável e é importado logo abaixo do headers
     */
    ?>
    <body>
        <div data-role="page" data-theme="a" id="page_9">
            <form name="formulario" id="formulario" action="<?= base_url('approval/confirm') ?>" method="post" data-ajax="false">
                <input type="hidden" name="token" value="<?= @$token; ?>">
                <?php
                // Cabeçalho é fixo
                include("header.php");
                ?>

                <div data-role="content" data-theme="a">
                    <div class="header"><h3>PESQUISA DE QUALIDADE</h3></div>
                    <div style="padding-left: 5px;">
                        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Atendimento da Empresa</legend>
                            <input type="radio" name="atendimento_radio" id="atendimento_radio_1" value="ÓTIMO">
                            <label for="atendimento_radio_1">Ótimo</label>
                            <input type="radio" name="atendimento_radio" id="atendimento_radio_2" value="BOM">
                            <label for="atendimento_radio_2">Bom</label>
                            <input type="radio" name="atendimento_radio" id="atendimento_radio_3" value="REGULAR">
                            <label for="atendimento_radio_3">Regular</label>
                            <input type="radio" name="atendimento_radio" id="atendimento_radio_4" value="INSATISFATÓRIO">
                            <label for="atendimento_radio_4">Insatisfatório</label>
                        </fieldset>
                        <br>
                        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Prestação de serviços / Qualidade da empresa</legend>
                            <input type="radio" name="prestacao_radio" id="prestacao_radio_1" value="ÓTIMO">
                            <label for="prestacao_radio_1">Ótimo</label>
                            <input type="radio" name="prestacao_radio" id="prestacao_radio_2" value="BOM">
                            <label for="prestacao_radio_2">Bom</label>
                            <input type="radio" name="prestacao_radio" id="prestacao_radio_3" value="REGULAR">
                            <label for="prestacao_radio_3">Regular</label>
                            <input type="radio" name="prestacao_radio" id="prestacao_radio_4" value="INSATISFATÓRIO">
                            <label for="prestacao_radio_4">Insatisfatório</label>
                        </fieldset>
                        <br>
                        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Agilidade da Empresa</legend>
                            <input type="radio" name="agilidade_radio" id="agilidade_radio_1" value="ÓTIMO">
                            <label for="agilidade_radio_1">Ótimo</label>
                            <input type="radio" name="agilidade_radio" id="agilidade_radio_2" value="BOM">
                            <label for="agilidade_radio_2">Bom</label>
                            <input type="radio" name="agilidade_radio" id="agilidade_radio_3" value="REGULAR">
                            <label for="agilidade_radio_3">Regular</label>
                            <input type="radio" name="agilidade_radio" id="agilidade_radio_4" value="INSATISFATÓRIO">
                            <label for="agilidade_radio_4">Insatisfatório</label>
                        </fieldset>
                        <br>
                        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Foram prestados todos os serviços solicitados?</legend>
                            <input type="radio" name="todos_radio" id="todos_radio_1" value="SIM">
                            <label for="todos_radio_1">SIM</label>
                            <input type="radio" name="todos_radio" id="todos_radio_2" value="NÃO">
                            <label for="todos_radio_2">NÃO</label>
                        </fieldset>
                    </div>
                    <br>
                    <div style="padding-left: 5px;">
                        <label for="textarea">Em caso negativo, por quê? (falta de material, andaime, etc.)</label>
                        <textarea name="mensagem_negativo" ></textarea>
                    </div>
                    <div style="padding-left: 5px;">
                        <label for="textarea">Em que horário a equipe foi liberada?</label>
                        <input type="time" name="hora_equipe_liberada">
                    </div>
                    <br>
                    <div class="header"><h3>TERMO DE ACEITE</h3></div>
                    <div style="padding-left: 5px;">
                        <p>Eu <b><?= @$manager_name ?></b>, aprovo esta Ordem de Serviço nº <b><?= @$os ?></b>, executada no período de <b><?= @$date_start ?></b> a <b><?= @$date_end ?></b> sob responsabilidade técnica de <b><?= @$technicians ?></b>.</p>
                    </div>
                    <br>
                    <div style="padding-left: 5px;">
                        <label for="textarea">Informe seu CPF para confirmar aprovação <small>* apenas números</small></label>
                        <input type="number" name="cpf" id="cpf" maxlength="11">
                    </div>
                    <br>
                    <div class="ui-grid-a">
                        <div>
                            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r submit" href="#">APROVAR</a>
                        </div>
                    </div><!-- /grid-a -->
                </div>
            </form>
        </div>
        <!--<div class="last-page" data-role="page" data-theme="a" id="page_10">
            <form name="formulario" id="formulario" action="<?= base_url('checklist') ?>" method="post" enctype="multipart/form-data" data-ajax="false">
        <?php
// Cabeçalho é fixo
        //include("header.php");
// Conteúdo da página 2
        //include("page_10.php")
        ?>
            </form>
        </div>-->
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
                if(TestaCPF($('#cpf').val())){
                    $('.carregando').show();
                    $('#formulario').submit();
                }else{
                    $('.carregando').hide();
                    alert("CPF preenchido não é válido!");
                    $('#cpf').selected();
                }
                return false;
            });

        });

        function TestaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
            if (strCPF == "00000000000")
                return false;
            if (strCPF.length != 11)
                return false;

            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)))
                return false;

            Soma = 0;
            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11)))
                return false;
            return true;
        }

    </script>
</html>