<div data-role="content" data-theme="a">
    <div class="header"><h3>IDENTIFICAÇÃO</h3></div>
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-right: 5px;">
            Cliente<br>
            <h4><?=@$client->name?></h4>
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Loja<br>
            <h4><?=@$store->name?></h4>
        </div>
    </div><!-- /grid-a -->
    <div>
        <a class="ui-btn ui-btn-icon-right ui-icon-back change-client" href="#">Alterar Cliente</a>
    </div>
    <div class="ui-grid-a">
        <div style="padding-right: 5px;">
            Ordem de Serviço<br>
            <input type="text" name="os" value="<?=@$session['os'];?>">
        </div>
    </div><!-- /grid-a -->
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-right: 5px;">
            Data Início Preventiva<br>
            <input type="date" name="datai" value="<?=@$session['datai'];?>">
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Data Fim Preventiva<br>
            <input type="date" name="dataf" value="<?=@$session['dataf'];?>">
        </div>
    </div><!-- /grid-a -->
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-right: 5px;">
            Hora Início<br>
            <input type="time" name="hora_inicial" value="<?=@$session['hora_inicial'];?>">
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Hora Fim<br>
            <input type="time" name="hora_final" value="<?=@$session['hora_final'];?>">
        </div>
    </div><!-- /grid-a -->
    <div>
        Técnicos<br>
        <input type="text" name="tecnicos" value="<?=@$session['tecnicos'];?>">
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a">
        </div>
        <div class="ui-block-b">
            <?php if($client->temp_only_ar != "1"){ ?>
                <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_2">Próximo</a>
            <?php }else{ ?>
                <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_6">Próximo</a>
            <?php } ?>
        </div>
    </div><!-- /grid-a -->
</div>
<div data-role="footer" data-position="fixed">
    <h1>
        <a class="numberCircle" href="#page_1">ID</a>
        <?php if($client->temp_only_ar != "1"){ ?>
        <a class="numberCircle" href="#page_2">1</a>
        <a class="numberCircle" href="#page_3">2</a>
        <a class="numberCircle" href="#page_4">3</a>
        <a class="numberCircle" href="#page_5">4</a>
        <?php } ?>
        <a class="numberCircle" href="#page_6">5</a>
        <a class="numberCircle" href="#page_7">6</a>
        <a class="numberCircle" href="#page_8">7</a>
        <!--<a class="numberCircle" href="#page_9">8</a>
        <!--<a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>-->
    </h1>
</div>