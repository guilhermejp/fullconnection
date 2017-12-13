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
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 1
                include("page_1.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_2">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_2.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_3">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_3.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_4">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_4.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_5">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_5.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_6">
            <form>
                <?php
// Cabeçalho é fixo
                include("header.php");
// Conteúdo da página 2
                include("page_6.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_7">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_7.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_8">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_8.php")
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_9">
            <form>
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_9.php")
                ?>
            </form>
        </div>
        <div class="last-page" data-role="page" data-theme="a" id="page_10">
            <form name="formulario" id="formulario" action="<?= base_url('form/checklist') ?>" method="post" enctype="multipart/form-data" data-ajax="false">
                <?php
// Cabeçalho é fixo
                include("header.php");
// Conteúdo da página 2
                include("page_10.php")
                ?>
            </form>
        </div>
    </body>
    <div class="carregando">
        <center>
            <img src="<?=base_url('assets/themes/images/ajax-loader.gif')?>" height="50px"><br>
            <p><img src="<?=base_url('assets/images/fulllogo2.png')?>" height="50px"></p>
            <p>Processando informações, aguarde...</p>
        </center>
    </div>
    <script>
        var qtdeQuadrosEletricos = 0;
        var qtdeArCondicionado = 0;
        var qtdeMaterial = 1;

        $(document).ready(function () {

            // Limpar Fomulários
            $('form').each(function () {
                $(this)[0].reset();
            });
            
            $('.add-quadro').click(function () {
                qtdeQuadrosEletricos++;
                var html = '<br>' +
                        '<div data-role="collapsible" id="set1" data-collapsed="true">' +
                        '<h3>Quadro Elétrico ' + qtdeQuadrosEletricos + ' <small><i>clique para expandir/recolher</i></small></h3>' +
                        '<p>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-right: 5px;">' +
                        '        Tipo<br>' +
                        '        <input type="text" name="qe_tipo[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Disj entrada<br>' +
                        '        <input type="text" name="qe_disj[]">' +
                        '    </div>' +
                        '</div>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-left: 5px;">' +
                        '        Local<br>' +
                        '        <input type="text" name="qe_local[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Andar<br>' +
                        '        <input type="text" name="qe_andar[]">' +
                        '    </div>' +
                        '</div>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check1[]" value="S">4.1. Verificar estado geral e condições<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check2[]" value="S">4.2. Realizar limpeza interna e externa<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check3[]" value="S">4.3. Limpar painel frontal<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check4[]" value="S">4.4. Verificar chaves/botoeiras<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check5[]" value="S">4.5. Verificar identificação dos cirtuitos<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check6[]" value="S">4.6. Verificar Superaquecimento de cabos<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check7[]" value="S">4.7. Reapertar parafusos de conexões elétricas<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="qe_check8[]" value="S">4.8. Verificar fiações, barramentos e sistema de aterramento<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '</p>' +
                        '</div>';
                $('#div-quadro-group').append(html);
                $('div[data-role=collapsible]').collapsible();
                $('div[data-role=collapsible]').trigger('create');
                $('#qtde_quadros_eletricos').val(qtdeQuadrosEletricos);
            });

            $('.add-ar-condicionado').click(function () {
                qtdeArCondicionado++;
                var html = '<br>' +
                        '<div data-role="collapsible" id="set1" data-collapsed="true">' +
                        '<h3>Ar Condicionado ' + qtdeArCondicionado + ' <small><i>clique para expandir/recolher</i></small></h3>' +
                        '<p>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-right: 5px;">' +
                        '        Tipo<br>' +
                        '        <input type="text" name="ar_tipo[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Marca<br>' +
                        '        <input type="text" name="ar_marca[]">' +
                        '    </div>' +
                        '</div>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-left: 5px;">' +
                        '        Localização e andar<br>' +
                        '        <input type="text" name="ar_local[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Capacidade<br>' +
                        '        <input type="text" name="ar_capacidade[]">' +
                        '    </div>' +
                        '</div>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-right: 5px;">' +
                        '        Tensão (V)<br>' +
                        '        <input type="text" name="ar_tensao[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Modelo<br>' +
                        '        <input type="text" name="ar_modelo[]">' +
                        '    </div>' +
                        '</div>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-left: 5px;">' +
                        '        Número de Série<br>' +
                        '        <input type="text" name="ar_serie[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        Setor que atende<br>' +
                        '        <input type="text" name="ar_setor[]">' +
                        '    </div>' +
                        '</div>' +
                        '<div class="ui-grid-a">' +
                        '    <div class="ui-block-a" style="padding-right: 5px;">' +
                        '        Nº pessoas no setor<br>' +
                        '        <input type="text" name="ar_pessoas[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        M² atendidos<br>' +
                        '        <input type="text" name="ar_m2[]">' +
                        '    </div>' +
                        '</div>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check1[]" value="S">5.1. Verificar e limpar filtros de ar<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check2[]" value="S">5.2. Limpar/desobstruir drenos<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check3[]" value="S">5.3. Verificar pressão de alta e baixa<br>' +
                        '    <i class="period">PERIODICIDADE SEMESTRAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check4[]" value="S">5.4. Verificar vedação dos painéis<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check5[]" value="S">5.5. verificar vibração no equipamento<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check6[]" value="S">5.6. Verificar e limpar condensador<br>' +
                        '    <i class="period">PERIODICIDADE SEMESTRAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check7[]" value="S">5.7. Verificar e limpar serpentina<br>' +
                        '    <i class="period">PERIODICIDADE SEMESTRAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check8[]" value="S">5.8. Verificar vedação carenagem<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check9[]" value="S">5.9. Verificar carga de gás<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check10[]" value="S">5.10. Verificar vazamentos<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check11[]" value="S">5.11. Medir corrente<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check12[]" value="S">5.12. Verificar atuação do termostato<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check13[]" value="S">5.13. Medir tensão elétrica da alimentação<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check14[]" value="S">5.14. Medir temperatura do ar ambiente<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check15[]" value="S">5.15. Testar funcionamento dos controles remotos<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '<label>' +
                        '    <input type="checkbox" name="ar_check16[]" value="S">5.16. Verificar carga de gás refrigerante<br>' +
                        '    <i class="period">PERIODICIDADE MENSAL</i>' +
                        '</label>' +
                        '</p>' +
                        '</div>';
                $('#div-ar-group').append(html);
                $('div[data-role=collapsible]').collapsible();
                $('div[data-role=collapsible]').trigger('create');
                $('#qtde_ar_condicionado').val(qtdeArCondicionado);
            });

            $('.add-material').click(function () {
                qtdeMaterial++;
                var html = '<div class="ui-grid-a campos_material">' +
                        '    <div class="ui-block-a" style="padding-left: 5px;">' +
                        '        <input type="text" name="mat_mat[]">' +
                        '    </div>' +
                        '    <div class="ui-block-b" style="padding-left: 5px;">' +
                        '        <input type="text" name="mat_qtde[]">' +
                        '    </div>' +
                        '</div>';
                $('.add-material').before(html);
                $('.campos_material').trigger('create');
                $('#qtde_material').val(qtdeMaterial);
            });

            $('.add-comprovante').click(function () {
                var html = '<input type="file" name="comprovante[]">';
                $('.add-comprovante').before(html);
                $('.div_comprovantes').trigger('create');
            });

            $('.submit').click(function () {

                var $lastPageForm = $('.last-page').find('form');
                $('.not-last-page').find('form').each(function () {
                    $.each($(this).find('input'), function () {
                        $lastPageForm.append($(this).clone());
                    });
                    $.each($(this).find('textarea'), function () {
                        $lastPageForm.append($(this).clone());
                    });
                });
                $('.carregando').show();
                $('#formulario').submit();
            });
        });
    </script>
</html>