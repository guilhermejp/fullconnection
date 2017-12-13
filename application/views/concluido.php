<?php
/*
 * author: Guilherme Silva
 * description: Tela de conclusão do envio do pedido
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
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
        <script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.mobile-1.4.5.min.js') ?>"></script>
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
            <?php
            // Cabeçalho é fixo
            include("header.php");
            ?>
            <div data-role="content" data-theme="a">
                <center>
                    <br>
                    <p><img src="<?= base_url('assets/images/concluido.png') ?>" height="50px"></p>
                    Dados Enviados com Sucesso!
                </center>
            </div>

            <div data-role="footer" data-position="fixed">
                <center><a class="ui-btn" href="#" onclick="document.location.href = '<?= base_url('') ?>'">Acessar Novo Checklist</a></center>
            </div>
        </div>
    </body>
</html>