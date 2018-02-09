<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="margin-left: 20px; margin-top: 20px; font-family: 'Oxygen', sans-serif; color: #555; ">
        <img src="<?= base_url('assets/images/fulllogo2.png') ?>"><br><br>
        <p><b>Prezado(a) <?= @$manager_name ?>,</b></p>
        <p>A Ordem de Serviço <b>Nº <?=@$os?> </b> efetuada em <b><?=@$client_name?> -> <?=@$store_desc?></b> foi finalizada e solicitamos sua aprovação.<br>
            O checklist detalhado do serviço prestado encontra-se em anexo.</p>
        <p><a href="<?= base_url('approval/' . @$token); ?>" target="_blank" class="w3-button w3-green">Clique aqui para continuar com a aprovação. </a></p>
        <br>
        <p>Atenciosamente,<br>
            <span style="font-family: 'Orbitron', sans-serif;">FULL CONNECTION</span><br>
            R. Rodolpho Senff, 647 – Curitiba – PR<br>
            (41)3653-6454<br>
            full@fullconnection.com.br
        </p>
    </body>
</html>