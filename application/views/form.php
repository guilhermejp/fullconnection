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
            <form id="form-client">
                <input type="hidden" name="sample_checkbox" id="sample_checkbox">
                <input type="hidden" name="cliente" id="cliente" value="<?=$client->id?>">
                <input type="hidden" name="cidade" id="cidade" value="<?=$store->id?>">
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
                if($client->temp_only_ar != "1"){
                    // Cabeçalho é fixo
                    include("header.php");
                    // Conteúdo da página 2
                    include("page_2.php");
                }
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_3">
            <form>
                <?php
                if($client->temp_only_ar != "1"){
                    // Cabeçalho é fixo
                    include("header.php");
                    // Conteúdo da página 2
                    include("page_3.php");
                }
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_4">
            <form>
                <?php
                if($client->temp_only_ar != "1"){
                    // Cabeçalho é fixo
                    include("header.php");
                    // Conteúdo da página 2
                    include("page_4.php");
                }
                ?>
            </form>
        </div>
        <div class="not-last-page" data-role="page" data-theme="a" id="page_5">
            <form>
                <?php
                if($client->temp_only_ar != "1"){
                    // Cabeçalho é fixo
                    include("header.php");
                    // Conteúdo da página 2
                    include("page_5.php");
                }
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
            <form id="form_page7">
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_7.php")
                ?>
            </form>
        </div>
        <div class="last-page" data-role="page" data-theme="a" id="page_8">
            <form name="formulario" id="formulario" action="<?= base_url('checklist') ?>" method="post" enctype="multipart/form-data" data-ajax="false">
                <?php
                // Cabeçalho é fixo
                include("header.php");
                // Conteúdo da página 2
                include("page_8.php")
                ?>
            </form>
        </div>
        <!--<div class="last-page" data-role="page" data-theme="a" id="page_9">
            <form name="formulario" id="formulario" action="<?= base_url('checklist') ?>" method="post" enctype="multipart/form-data" data-ajax="false">
                <?php
                // Cabeçalho é fixo
                //include("header.php");
                // Conteúdo da página 2
                //include("page_9.php")
                ?>
            </form>
        </div>-->
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
        <?= (@$mensagem!="")?" alert('".$mensagem."'); \n":""; ?>
        var qtdeQuadrosEletricos = 0;
        var qtdeArCondicionado = 0;
        var qtdeMaterial = 1;
        var conectado=1;

        $(document).ready(function () {
            // Limpar Fomulários
            $('form').each(function () {
                $(this)[0].reset();
            });
            
            $('.change-client').click(function(){
                if(confirm("Você poderá perder as informações digitadas neste checklist, deseja realmente trocar de cliente?")){
                    document.location.href = "<?=base_url()?>inicial/new";
                }
                return false;
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
                saveField();
            });

            $('.add-comprovante').click(function () {
                var html = '<input type="file" name="comprovante[]" class="comprovante">';
                $('.add-comprovante').before(html);
                $('.div_comprovantes').trigger('create');
                /*$('.comprovante').unbind('change');
                 elementoComprovante();*/
            });

            var campo = "";
            /*elementoComprovante();*/

            $('.submit').click(function () {
                ajax('form/check_connection', $("#formulario"), "check_connection");
                return false;
            });

            // Gravar cookies e sessions a cada campo
            saveField();
            retrieveSessionMat();

            // Recuperar as Sessions dos demais campos que não são array
            // Recuperar os cookies (Quando cookies estiverem preenchidos são superiores a sessions)
            $('input').each(function () {
                if($(this).attr('name').substr(-2) == "[]"){
                    /*if(getCookie($(this).attr('name')) !== null){
                        valor = getCookie($(this).attr('name'));
                        valor = valor.split("|");
                        name = $(this).attr('name');
                        retorno=0;
                        if(name == "mat_mat[]"){
                            $.each(valor, function(index, value){
                                if(index > 0){
                                    $('.add-material').trigger('click');
                                }
                            });
                        }
                        $.each(valor, function(index, value){
                            $('input[name=\"'+name+'\"]').eq(index).val(value);
                        });
                    }*/
                }else if(getCookie($(this).attr('name')) !== null){
                    if($(this).attr('type') == "checkbox"){
                        if(getCookie($(this).attr('name')) != ""){
                            $(this).attr("checked","checked");
                        }
                    }else{
                        $(this).val(getCookie($(this).attr('name')));
                    }
                }
            });
            
            $('textarea').each(function () {
                if(getCookie($(this).attr('name')) !== null){
                    $(this).html(getCookie($(this).attr('name')));
                }
            });

        });

        // Sucesso ao chamar a função de salvar os campos do formulário
        function save_field(result){
            if(result.retorno == true){
                return false;
            }else{
                alert("Erro ao gravar o formuário automático, entre em contato com o suporte técnico!");
            }
            
        }
        // Erro ao chamar a função de salvar os campos do formulário
        function save_field_erro(){
            alert("Atenção, você está SEM CONEXÃO COM A INTERNET!\nNão feche o browser para não perder os dados já digitados, tente reestabelecer a conexão!");
            conectado = 0;
            return false;
        }
        
        function carrega_equipamentos(retorno) {
            html = "";
            qtdeArCondicionado = 0;
            $.each(retorno.ac, function (i, item) {
                html += load_ar_condicionado(item);
            });
            $('#div-ar-group').html(html);
            $('#qtde_ar_condicionado').val(qtdeArCondicionado);

            html = "";
            qtdeQuadrosEletricos = 0;
            $.each(retorno.ep, function (i, item) {
                qtdeQuadrosEletricos++;
                html += load_quadro_eletrico(i, item);
            });
            $('#div-quadro-group').append(html);
            $('#qtde_quadros_eletricos').val(qtdeQuadrosEletricos);

            $('div[data-role=collapsible]').collapsible();
            $('div[data-role=collapsible]').trigger('create');
            
            saveField();
            $('#qtde_quadros_eletricos, #qtde_ar_condicionado').trigger('change');

        }

        function load_ar_condicionado(item) {
            qtdeArCondicionado++;
            html = '<br>' +
                    '<div data-role="collapsible" id="set1" data-collapsed="true">' +
                    '<h3>' + item.name + ' <small><i>clique para expandir/recolher</i></small></h3>' +
                    '<input type="hidden" name="ar_desc[]" value="' + item.name + '">' +
                    '<p>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-right: 5px;">' +
                    '        Tipo<br>' +
                    '        <input type="text" name="ar_tipo[]" value="' + item.type + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Marca<br>' +
                    '        <input type="text" name="ar_marca[]" value="' + item.brand + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-left: 5px;">' +
                    '        Localização e andar<br>' +
                    '        <input type="text" name="ar_local[]" value="' + item.site + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Capacidade<br>' +
                    '        <input type="text" name="ar_capacidade[]" value="' + item.capacity + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-right: 5px;">' +
                    '        Tensão (V)<br>' +
                    '        <input type="text" name="ar_tensao[]" value="' + item.volts + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Modelo<br>' +
                    '        <input type="text" name="ar_modelo[]" value="' + item.model + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-left: 5px;">' +
                    '        Número de Série<br>' +
                    '        <input type="text" name="ar_serie[]" value="' + item.serial_number + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Setor que atende<br>' +
                    '        <input type="text" name="ar_setor[]" value="' + item.sector + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-right: 5px;">' +
                    '        Nº pessoas no setor<br>' +
                    '        <input type="text" name="ar_pessoas[]" value="' + item.people_sector + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        M² atendidos<br>' +
                    '        <input type="text" name="ar_m2[]" value="' + item.square_meter + '" readonly="readonly">' +
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
                    '    <i class="period">PERIODICIDADE ANUAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="ar_check7[]" value="S">5.7. Verificar e limpar serpentina<br>' +
                    '    <i class="period">PERIODICIDADE ANUAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="ar_check8[]" value="S">5.8. Verificar vedação carenagem<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="ar_check9[]" value="S">5.9. Verificar nível de gás<br>' +
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
                    '    <input type="checkbox" name="ar_check16[]" value="S">5.16. Tensão no Motor<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '        Valor Tensão<input type="text" name="ar_16[]">'+
                    '<label>' +
                    '    <input type="checkbox" name="ar_check17[]" value="S">5.17. Corrente no Motor<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '        Valor Corrente<input type="text" name="ar_17[]">'+
                    /*'<label>' +
                    '    <input type="checkbox" name="ar_check16[]" value="S">5.16. Verificar carga de gás refrigerante<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +*/
                    '</p>' +
                    '</div>';

            return html;
        }

        function load_quadro_eletrico(ind, item) {
            html = '<br>' +
                    '<div data-role="collapsible" id="set1" data-collapsed="true">' +
                    '<h3>' + item.name + ' <small><i>clique para expandir/recolher</i></small></h3>' +
                    '<input type="hidden" name="qe_desc['+ind+']" value="' + item.name + '">' +
                    '<p>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-right: 5px;">' +
                    '        Tipo<br>' +
                    '        <input type="text" name="qe_tipo['+ind+']" value="' + item.type + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Disj entrada<br>' +
                    '        <input type="text" name="qe_disj['+ind+']" value="' + item.switch + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<div class="ui-grid-a">' +
                    '    <div class="ui-block-a" style="padding-left: 5px;">' +
                    '        Local<br>' +
                    '        <input type="text" name="qe_local['+ind+']" value="' + item.site + '" readonly="readonly">' +
                    '    </div>' +
                    '    <div class="ui-block-b" style="padding-left: 5px;">' +
                    '        Andar<br>' +
                    '        <input type="text" name="qe_andar['+ind+']" value="' + item.floor + '" readonly="readonly">' +
                    '    </div>' +
                    '</div>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check1['+ind+']" value="S">4.1. Verificar estado geral e condições<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check2['+ind+']" value="S">4.2. Realizar limpeza interna e externa<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    /*'<label>' +
                    '    <input type="checkbox" name="qe_check3['+ind+']" value="S">4.3. Limpar painel frontal<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +*/
                    '' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check4['+ind+']" value="S">4.3. Verificar chaves/botoeiras<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check5['+ind+']" value="S">4.4. Verificar identificação dos cirtuitos<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check6['+ind+']" value="S">4.5. Verificar Superaquecimento de cabos<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check7['+ind+']" value="S">4.6. Reapertar parafusos de conexões elétricas<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check8['+ind+']" value="S">4.7. Verificar fiações, barramentos e sistema de aterramento<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<label>' +
                    '    <input type="checkbox" name="qe_check9['+ind+']" value="S">4.8. Medição de tensão<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<div class="ui-grid-b">'+
                    '    <div class="ui-block-a" style="padding-right: 5px;">'+
                    '        RS<input type="text" name="qe_9_rs['+ind+']">'+
                    '    </div>'+
                    '    <div class="ui-block-b" style="padding-left: 5px;">'+
                    '        ST<input type="text" name="qe_9_st['+ind+']">'+
                    '    </div>'+
                    '    <div class="ui-block-c" style="padding-left: 5px;">'+
                    '        RT<input type="text" name="qe_9_rt['+ind+']">'+
                    '    </div>'+
                    '</div>'+
                    '<label>' +
                    '    <input type="checkbox" name="qe_check10['+ind+']" value="S">4.9. Medição de corrente<br>' +
                    '    <i class="period">PERIODICIDADE MENSAL</i>' +
                    '</label>' +
                    '<div class="ui-grid-b">'+
                    '    <div class="ui-block-a" style="padding-right: 5px;">'+
                    '        R<input type="text" name="qe_10_r['+ind+']">'+
                    '    </div>'+
                    '    <div class="ui-block-b" style="padding-left: 5px;">'+
                    '        S<input type="text" name="qe_10_s['+ind+']">'+
                    '    </div>'+
                    '    <div class="ui-block-c" style="padding-left: 5px;">'+
                    '        T<input type="text" name="qe_10_t['+ind+']">'+
                    '    </div>'+
                    '</div>'+
                    '</p>' +
                    '</div>';
            return html;
        }

        function elementoComprovante() {
            $('.comprovante').change(function (event) {
                campo = this;
                $('.carregando_img').show();
                var formData = new FormData($('#form_page7')[0]);
                formData.append('comprovante', event.target.files[0]);
                formData.append('os', $("[name=os]").val());
                formData.append('cliente', $("[name=cliente]").val());
                formData.append('datai', $("[name=datai]").val());
                formData.append('cidade', $("[name=cidade]").val());

                return $.ajax({
                    url: "<?= base_url('form/upload'); ?>",
                    data: formData,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    method: "POST",
                    type: "POST",
                    dataType: "json",
                    success: function (result) {
                        if (result.retorno == true) {
                            $(campo).before('<div>Imagem Salva com sucesso! OK</div><input type="hidden" name="comprovante[]" readonly="readonly" value="' + result.imagem + '">');
                            $(campo).remove();
                        } else {
                            alert("Erro ao selecionar a imagem, tente novamente");
                            alert(result.retorno);
                            alert(result.tamanho);
                            alert(result.error);
                        }
                        $('.carregando_img').hide();
                    }
                });

            });
        }
        
        function saveField(){
        // A cada alterado de campo será gravado o valor em cookie e em session
            // Verifica se está conectado, caso não estiver informado ao usuário,
            //      continua gravando apenas o cookie para não perder.
            $('select, input, textarea').change(function(){
               var val = $(this).val();
               var id = this;
               // Exclusivo para mat_mat e outro que poderá vir
               if($(id).attr('name').substr(-2) == "[]"){
                   id = 'input[name^="'+$(id).attr('name')+'"]';
                   //percorre todos os campos para setar o cookie
                   var valor = "";
                   $(id).each(function () {
                       valor += $(this).val()+"|";
                   });
                   setCookie($(this).attr('name'), valor);
                   
               // para todos os demais checkboxes, sendo array ou não
               }else if($(this).attr('type') == "checkbox"){
                   id = "#sample_checkbox";
                   if($(this).is(':checked')){
                       $('#sample_checkbox').val($(this).attr('name')+":"+$(this).val());
                       val = $(this).attr('name')+":"+$(this).val();
                       // Gravar cookie normal
                       setCookie($(this).attr('name'), $(this).val());
                    }else{
                       $('#sample_checkbox').val($(this).attr('name')+":");
                       val = $(this).attr('name')+":";
                       // Gravar cookie vazio
                       setCookie($(this).attr('name'),"");
                    }
               // para input que são array fixo [0], [1], [2], não variável ([] [] [])
               }else if($(id).attr('name').substr(-1) == "]"){
                   id = "#sample_checkbox";
                   $('#sample_checkbox').val($(this).attr('name')+":"+$(this).val());
                   val = $(this).attr('name')+":"+$(this).val();
                   setCookie($(this).attr('name'), $(this).val());
               }else{
                   setCookie($(this).attr('name'), $(this).val());
               }
               
               if(conectado == 1){
                    ajax('form/save_field', $(id), "save_field");
               }
            });
        }
        
        function check_connection(){
            $('.carregando').show();
            var $lastPageForm = $('.last-page').find('form');
                $('.not-last-page').find('form').each(function () {
                    $.each($(this).find('select'), function () {
                        $lastPageForm.append($(this)[0]);
                    });
                    $.each($(this).find('input'), function () {
                        $lastPageForm.append($(this).clone());
                    });
                    $.each($(this).find('textarea'), function () {
                        $lastPageForm.append($(this).clone());
                    });
                });
            $('#formulario').submit();
        }
        
        function check_connection_erro(){
            alert("SEM CONEXÃO COM A INTERNET!\nReconecte-se e tente enviar o formulário novamente.");
        }

        function retrieveSessionMat(){
            <?php
            if(is_array(@$session['mat_mat'])){
                foreach($session['mat_mat'] as $ind=>$value){
                    echo " $('input[name=\"mat_mat[]\"]').eq($ind).val('$value'); ";
                    echo " $('input[name=\"mat_qtde[]\"]').eq($ind).val('".@$session['mat_qtde'][$ind]."'); ";
                    echo " $('.add-material').trigger('click'); ";
                }
            }
            ?>
        }
    </script>
</html>