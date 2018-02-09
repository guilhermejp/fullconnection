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
        <br>
        <h3 class="header">TERMO DE ACEITE</h3>
        <hr>
        <p class="header"><i>Eu <b><?= @$manager_name ?></b>, CPF: <b><?= @$cpf ?></b>, aprovo esta Ordem de Serviço nº <b><?= @$os ?></b>, executada no período de <b><?= @$date_start ?></b> a <b><?= @$date_end ?></b> sob responsabilidade técnica de <b><?= @$technicians ?></b>.</i></p>
        <br>
        <table class="w100" style="margin-left: 10px;" cellpacing="0" cellpadding="0">
            <tr>
                <td><div class="zeroheight"><?= @$date_approval ?></div></td>
                <td><div class="zeroheight"><?= @$ip_approval ?></div></td>
                <td><div class="zeroheight"><?= @$manager_email ?></div></td>
            </tr>
            <tr class="ident_text">
                <td><div class="zeroheight">DATA/HORA APROVAÇÃO</div></td>
                <td><div class="zeroheight">IP APROVADOR</div></td>
                <td><div class="zeroheight">EMAIL APROVADOR</div></td>
            </tr>
        </table>
    </body>
</html>
