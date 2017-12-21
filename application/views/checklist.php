<!DOCTYPE html>
<html>
    <head>
        <title>Checklist</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <style tyle="text/css">

            .fa {
                display: inline;
                font-style: normal;
                font-variant: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 1;
                font-family: FontAwesome;
                font-size: inherit;
                text-rendering: auto;
                width: .5em;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .fa-check-square-o, .fa-square-o{
                width: .8em !important;
                font-size: 15px;
            }

            body{
                font-family: 'Oxygen', sans-serif;
                color: #333;
                font-size: 13px;
            }

            .w100{
                width: 100%;
            }

            .w100 tr td{
                /*border: #000 solid 1px;*/
                padding: 0px;
                margin: 0px;
            }

            h1, h2, h3, h4, h5{
                font-family: 'Orbitron', sans-serif;
            }

            .ident_text td{
                color: #999;
                font-size: 8px;
                padding-bottom: 15px;
                height: 1px;
            }

            .header{
                margin-left: 15px;
            }

            .table_itens{
                font-size: 10px;
            }

            .table_itens tr td{
                border-bottom: #CCC 1px solid;
                /*padding: 5px;*/
            }

            .period{
                font-weight: bold;
                font-size: 8px;
                font-style: italic;
                color: #C42A23;
            }

            .zeroheight{
                height: 15px;
            }

        </style>
    </head>
    <body>
        <table class="w100">
            <tr>
                <td style="width: 33%"><img src="<?= FCPATH . 'assets/images/'.$cliente.'.png'; ?>" height="30px;"></td>
                <td style="width: 33%" align="center"><h2>Checklist</h2></td>
                <td style="width: 34%" align="right"><img src="<?= FCPATH . 'assets/images/fulllogo2.png'; ?>" height="30px;"></td>
            </tr>
        </table>
    <center>
        <table class="w100" cellpacing="0" cellpadding="0">
            <tr>
                <td></td><td><div class="zeroheight"><?= @$cidade ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$datai ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$dataf ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$hora_inicial ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$hora_final ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$os ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-map-marker"></i></td><td><div class="zeroheight">LOJA</div></td>
                <td><i class="fa fa-calendar"></i>	</td><td><div class="zeroheight">DATA INICIO PREVENTIVA</div></td>
                <td><i class="fa fa-calendar"></i>	</td><td><div class="zeroheight">DATA FIM PREVENTIVA</div></td>
                <td><i class="fa fa-clock-o"></i>	</td><td><div class="zeroheight">HORA INICIAL</div></td>
                <td><i class="fa fa-clock-o"></i>	</td><td><div class="zeroheight">HORA FINAL</div></td>
                <td><i class="fa fa-file-o"></i>	</td><td><div class="zeroheight">ORDEM DE SERVIÇO</div></td>
            </tr>
            <tr>
                <td></td><td colspan="9"><div class="zeroheight"><?= @$tecnicos ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-users"></i></td><td colspan="8"><div class="zeroheight">TÉCNICOS</div></td>
            </tr>
        </table>
    </center>
    <h3 class="header">CIVIL</h3>
    <hr>
    <table class="w100 table_itens" cellspacing="0">
        <tr>
            <td><i class="fa <?= @$civil_check1 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i> &nbsp; </td>
            <td> 1 - VERIFICAR E RECOMPOR NA COBERTURA, RUFOS, CONDUTORES, TIRANTES, FURAÇÕES, EXECUTANDO REFORÇO DA IMPERMEABILIZAÇÃO NESSES PONTOS.</td>
            <td class="period" align="right">SEMANAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check2 == "S" ? "fa-check-square-o" : "fa-square-o" ?>  check"></i></td>
            <td> 2 - VERIFICAR ESTADO GERAL DE PORTÕES E GRADES.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check3 == "S" ? "fa-check-square-o" : "fa-square-o" ?>  check"></i></td>
            <td> 3 - AVALIAÇÃO GERAL DAS PAREDES (QUEBRAS, DESGASTE, PINTURAS).</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check4 == "S" ? "fa-check-square-o" : "fa-square-o" ?>  check"></i></td>
            <td> 4 - VERIFICAR ESTADO GERAL DE ESCADAS, CORRIMÕES E CALÇAMENTO EFETUANDO PQ REPAROS (ATÉ 5M²).</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check5 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td> 5 - REPAROS COM CALAFETAÇÃO DE JUNÇÕES EM CALHAS, RUFOS E CONDUTORES.</td>
            <td class="period" align="right">SEMANAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check6 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>6 - VERIFICAR ESTADO GERAL DE CONSERVAÇÃO DE CALÇADAS, PÁTIOS, ACESSOS, ALAMBRADOS.</td>
            <td class="period" align="right">SEMANAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check7 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>7 - VERIFICAR ESTADO DE PAREDES INTERNAS, EXTERNAS E FORROS EFETUANDO PEQUENOS REPAROS/PINTURA (ATÉ 20M²).</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$civil_check8 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>8 - VERIFICAR ESTADO DE PISOS, CARPETES E AZULEJOS EFETUANDO PEQUENOS REPAROS (ATÉ 5M²).</td>
            <td class="period" align="right">MENSAL</td>
        </tr>        
    </table>
    <br>
    <h3 class="header">INSTALAÇÕES HIDRÁULICAS E PLUVIAIS</h3>
    <hr>
    <table class="w100 table_itens" cellspacing="0">
        <tr>
            <td><i class="fa <?= @$hid_check1 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i> &nbsp; </td>
            <td>1- LIMPAR CISTERNA/CAIXA D'ÁGUA.</td>
            <td class="period" align="right">ANUAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check2 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>2 - VERIFICAR ESTADO GERAL DOS RESERVATÓRIOS QUANTO A LIMPEZA E ASPECTO DA ÁGUA, VEDAÇÃO E FIXAÇÃO DAS TAMPAS, BÓIAS E VAZAMENTOS.</td>
            <td class="period" align="right">ANUAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check3 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>3 - VERIFICAR CONDIÇÕES DE ABRIGO EXECUTANDO PEQUENOS REPAROS</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check4 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>4 - VERIFICAR ESTADO GERAL DE RALOS, CAIXAS DE GORDURA E TUBULAÇÕES EM GERAL DOS SANITÁRIOS E COPA EFETUANDO OS REPAROS NECESSÁRIOS.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check5 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>5- VERIFICAR DISPOSITIVOS DE ACIONAMENTO.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check6 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>6 - SUBSTITUIÇÃO DE METAIS SANITÁRIOS DEFEITUOSOS (SIFÕES, TORNEIRAS, VÁLVULAS, GRELHAS DE RALO, SABONETEIRAS, ESPELHOS, ASSENTOS, ENGATES, ETC.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check7 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>7 - VERIFICAÇÃO DE VAZAMENTOS.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$hid_check8 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>8 - VERIFICAR FUNCIONAMENTO DAS TORNEIRAS E VAZAMENTOS DOS BEBEDOUROS.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>        
    </table>

    <br>
    <h3 class="header">INSTALAÇÕES ELÉTRICAS</h3>
    <hr>
    <table class="w100 table_itens" cellspacing="0">
        <tr>
            <td><i class="fa <?= @$elet_check1 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i> &nbsp; </td>
            <td>1 - SUBSTITUIR LÂMPADAS QUEIMADAS, SOQUETES, FOTOCÉLULAS, REATORES, STARTERS, DISJUNTORES, ETC.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check2 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>2 - LUMINÁRIAS: LIMPAR, VERIFICAR FIXAÇÃO, FIAÇÃO, ACRÍLICOS, BOCAIS, VIDROS DE PROTEÇÃO, ETC.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check3 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>3 - VERIFICAR ESTADO GERAL DE TOMADAS, INTERRUPTORES, TELEFONE E CABO DE REDE, CORRIGINDO EVENTUAIS PROBLEMAS.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check4 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>4 - VERIFICAR E CORRIGIR PROBLEMAS COM VENTILADORES E CORTINAS DE AR.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check5 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>5 - VERIFICAR ESTADO GERAL DE QUADROS DE DISTRIBUIÇÃO E DE MEDIÇÃO, SUBSTITUINDO ELEMENTOS DEFEITUOSOS, VERIFICANDO FIXAÇÕES, CONEXÕES, ISOLAÇÕES, ATERRAMENTO.</td>
            <td class="period" align="right">BIMESTRAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check6 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>6 - EFETUAR LIMPEZA GERAL, LUBRIFICAR PARTES MÓVEIS E ELIMINAR PONTO DE FERRUGENS E CORROSÃO EM QUADROS ELÉTRICOS.</td>
            <td class="period" align="right">BIMESTRAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check7 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>7 - RELACIONAR CIRCUITOS QUE ESTEJAM COM SUPERAQUEIMENTO, INDICANDO CAPACIDADE DO DISJUNTOR, CORRENTE MEDIDA A PLENA CARGA E BITOLA DO CONDUTOR E ORÇAR A CORREÇÃO.</td>
            <td class="period" align="right">BIMESTRAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check8 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>8 - VERIFICAR FUNCIONAMENTO, SUBSTITUIR EVENTUAIS PEÇAS DANIFICADAS (LÂMPADAS, BATERIAS, ETC) EM LUMINÁRIAS DE EMERGÊNCIA.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check9 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>9 - VERIFICAR REATORES E STARTERS DEFEITUOSOS.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
        <tr>
            <td><i class="fa <?= @$elet_check9 == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
            <td>10 - VERIFICAR A BORRACHA DE VEDAÇÃO, GRADES, BANDEJAS INTERNAS, VAZAMENTO DE GÁS DAS GELADEIRAS E CONSTATANDO-SE QUALQUER ANOMALIA, ACIONAR EMPRESA AUTORIZADA.</td>
            <td class="period" align="right">MENSAL</td>
        </tr>
    </table>
    <br>
    <br>
    <h3 class="header">QUADROS ELÉTRICOS</h3>
    <hr>

    <?php
    $i = null;
    for ($ind = 1; $ind <= @$qtde_quadros_eletricos; $ind++) {
        $i = $ind - 1;
        ?>

        <center><h4>Quadro Elétrico <?= $ind; ?></h4></center>
        <table class="w100" cellpacing="0" cellpadding="0">
            <tr>
                <td></td><td><div class="zeroheight"><?= @$qe_tipo[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$qe_disj[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$qe_local[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$qe_andar[$i] ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-tag"></i>	</td><td><div class="zeroheight">TIPO</div></td>
                <td><i class="fa fa-bolt"></i>	</td><td><div class="zeroheight">DISJ ENTRADA</div></td>
                <td><i class="fa fa-map-marker"></i></td><td><div class="zeroheight">LOCAL</div></td>
                <td><i class="fa fa-building-o"></i>	</td><td><div class="zeroheight">ANDAR</div></td>
            </tr>

        </table>

        <table class="w100 table_itens" cellspacing="0">
            <tr>
                <td width="3%"><i class="fa <?= @$qe_check1[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i> &nbsp; </td>
                <td>1 - VERIFICAR ESTADO GERAL E CONDIÇÕES.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check2[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>2 - REALIZAR LIMPEZA INTERNA E EXTERNA.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check3[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>3 - LIMPAR PAINEL FRONTAL.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check4[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>4 - VERIFICAR CHAVES/BOTOEIRAS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check5[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>5 - VERIFICAR IDENTIFICAÇÃO DOS CIRCUITOS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check6[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>6 - VERIFICAR SUPERAQUECIMENTO DE CABOS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check7[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>7 - REAPERTAR PARAFUSOS DE CONEXÕES ELÉTRICAS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$qe_check8[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>8 - VERIFICAR FIAÇÕES, BARRAMENTOS E SISTEMA DE ATERRAMENTO.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
        </table>

        <?php
    }
    if ($i === null) {
        ?>
        <center><h4><i>Não há informações de quadros elétricos!</i></h4></center>
        <?php
    }
    ?>

    <br>
    <h3 class="header">AR CONDICIONADO</h3>
    <hr>

    <?php
    $i = null;
    for ($ind = 1; $ind <= @$qtde_ar_condicionado; $ind++) {
        $i = $ind - 1;
        ?>

        <center><h4>Ar Condicionado <?= $ind; ?></h4></center>
        <table class="w100" cellpacing="0" cellpadding="0">
            <tr>
                <td></td><td><div class="zeroheight"><?= @$ar_tipo[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_marca[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_local[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_capacidade[$i] ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-bookmark"></i>	</td><td><div class="zeroheight">TIPO</div></td>
                <td><i class="fa fa-tag"></i>	</td><td><div class="zeroheight">MARCA</div></td>
                <td><i class="fa fa-building-o"></i></td><td><div class="zeroheight">LOCALIZAÇÃO E ANDAR</div></td>
                <td><i class="fa fa-cubes"></i>	</td><td><div class="zeroheight">CAPACIDADE</div></td>
            </tr>
            <tr>
                <td></td><td><div class="zeroheight"><?= @$ar_tensao[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_modelo[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_serie[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_setor[$i] ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-bolt"></i>	</td><td><div class="zeroheight">TENSÃO (V)</div></td>
                <td><i class="fa fa-tags"></i>	</td><td><div class="zeroheight">MODELO</div></td>
                <td><i class="fa fa-hashtag"></i></td><td><div class="zeroheight">NÚMERO DE SÉRIE</div></td>
                <td><i class="fa fa-sitemap"></i>	</td><td><div class="zeroheight">SETOR QUE ATENDE</div></td>
            </tr>
            <tr>
                <td></td><td><div class="zeroheight"><?= @$ar_pessoas[$i] ?></div></td>
                <td></td><td><div class="zeroheight"><?= @$ar_m2[$i] ?></div></td>
                <td></td><td><div class="zeroheight"></div></td>
                <td></td><td><div class="zeroheight"></div></td>
            </tr>
            <tr class="ident_text">
                <td><i class="fa fa-users"></i></td><td><div class="zeroheight">Nº PESSOAS NO SETOR</div></td>
                <td><i class="fa fa-square"></i></td><td><div class="zeroheight">M² ATENDIDOS</div></td>
                <td></td><td><div class="zeroheight"></div></td>
                <td></td><td><div class="zeroheight"></div></td>
            </tr>
        </table>

        <table class="w100 table_itens" cellspacing="0">
            <tr>
                <td width="3%"><i class="fa <?= @$ar_check1[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i> &nbsp; </td>
                <td>1 - VERIFICAR E LIMPAR FILTROS DE AR.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check2[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>2 - LIMPAR/DESOBSTRUIR DRENOS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check3[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>3 - VERIFICAR PRESSÃO DE ALTA E BAIXA.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check4[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>4 - VERIFICAR VEDAÇÃO DOS PAINEIS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check5[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>5 - VERIFICAR VIBRAÇÃO NO EQUIPAMENTO.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check6[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>6 - VERIFICAR E LIMPAR CONDENSADOR.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check7[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>7 - VERIFICAR E LIMPAR SERPENTINA.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check8[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>8 - VERIFICAR VEDAÇÃO CARENAGEM.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check9[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>9 - VERIFICAR CARGA DE GÁS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check10[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>10 - VERIFICAR VAZAMENTOS.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check11[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>11 - MEDIR CORRENTE.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check12[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>12 - VERIFICAR ATUAÇÃO DO TERMOSTATO.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check13[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>13 - MEDIR TENSÃO ELÉTRICA DA ALIMENTAÇÃO.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check14[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>14 - MEDIR TEMP. AR AMBIENTE.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check15[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>15 - TESTES FUNC. CONTROLES REMOTO.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
            <tr>
                <td><i class="fa <?= @$ar_check16[$i] == "S" ? "fa-check-square-o" : "fa-square-o" ?> check"></i></td>
                <td>16 - VERIFICAR CARGA DE GÁS REFRIGERANTE.</td>
                <td class="period" align="right">MENSAL</td>
            </tr>
        </table>

        <?php
    }
    if ($i === null) {
        ?>
        <center><h4><i>Não há informações de ar condicionado!</i></h4></center>
        <?php
    }
    ?>

    <br>
    <h3 class="header">MATERIAIS UTILIZADOS NA PREVENTIVA</h3>
    <hr>
    <table class="w100" cellpacing="0" cellpadding="0">
        <tr>
            <td><b>MATERIAL</b></td>
            <td><b>QUANTIDADE</b></td>
        </tr>
        <?php
        for ($ind = 1; $ind <= @$qtde_material; $ind++) {
            $i = $ind - 1;
            ?>
            <tr>
                <td><div class="zeroheight"><?= @$mat_mat[$i] ?></div></td>
                <td><div class="zeroheight"><?= @$mat_qtde[$i] ?></div></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <br>
    <h3 class="header">EXTRAS</h3>
    <hr>
    <p><?= @$extras ?></p>

    <br>
    <!--<h3 class="header">COMPROVANTES</h3>
    <hr>
    <center>
        <?php
        /*if(isset($comprovante)) {
            foreach (@$comprovante as $value) {
                ?>
                <img src="<?= @$value ?>" style="max-width: 500px;">
                <?php
            }
        }*/
        ?>
    </center>
    <br>-->
    <h3 class="header">SERVIÇOS EXECUTADOS E SOLICITADOS PELO GERENTE</h3>
    <hr>
    <p><?= @$servicos_executados ?></p>
    <br>
    <h3 class="header">OBSERVAÇÕES/JUSTIFICATIVAS DO TÉCNICO</h3>
    <hr>
    <p><?= @$justificativa ?></p>

    <br>
    <h3 class="header">PESQUISA DE QUALIDADE</h3>
    <hr>
    <table class="w100" cellpacing="0" cellpadding="0">
        <tr>
            <td><div class="zeroheight"><?= @$atendimento_radio ?></div></td>
            <td><div class="zeroheight"><?= @$prestacao_radio ?></div></td>
        </tr>
        <tr class="ident_text">
            <td><div class="zeroheight">ATENDIMENTO DA EMPRESA</div></td>
            <td><div class="zeroheight">PRESTAÇÃO DE SERVIÇOS/QUALIDADE DA EMPRESA</div></td>
        </tr>
        <tr>
            <td><div class="zeroheight"><?= @$agilidade_radio ?></div></td>
            <td><div class="zeroheight"><?= @$todos_radio ?></div></td>
        </tr>
        <tr class="ident_text">
            <td><div class="zeroheight">AGILIDADE EMPRESA</div></td>
            <td><div class="zeroheight">FORAM REALIZADOS TODOS OS SERVIÇOS SOLICITADOS?</div></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$mensagem_negativo ?></td>
        </tr>
        <tr class="ident_text">
            <td colspan="2">EM CASO NEGATIVO, POR QUÊ? (FALTA DE MATERIAL, ANDAIME, ETC.)</td>
        </tr>
        <tr>
            <td colspan="2"><div class="zeroheight"><?= @$hora_equipe_liberada ?></div></td>
        </tr>
        <tr class="ident_text">
            <td colspan="2"><div class="zeroheight">EM QUAL HORÁRIO A EQUIPE FOI LIBERADA?</div></td>
        </tr>
    </table>
    <br>
    <hr>
    <br>
    <center><h4 class="header">DECLARO QUE ESTOU DE ACORDO COM TODAS AS INFORMAÇÕES AQUI RELATADAS</h4></center>
    <br>

    <table class="w100" cellpacing="0" cellpadding="0">
        <tr>
            <td><div align="center"><img src="<?= @$assinatura_tecnico ?>" width="250px;"></div></td>
            <td><div align="center"><?= @$data_aceite ?></div></td>
            <td><div align="center"><img src="<?= @$assinatura_gerente ?>" width="250px;"></div></td>
        </tr>
        <tr class="ident_text">
            <td><div align="center">TÉCNICO</div></td>
            <td><div align="center">DATA</div></td>
            <td><div align="center">GERENTE DA LOJA</div></td>
        </tr>
    </table>
</body>
</html>
