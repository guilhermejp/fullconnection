<div data-role="content" data-theme="a">
    <div class="header"><h3>INSTALAÇÕES HIDRÁULICAS E PLUVIAIS</h3></div>
    <!--<label>
        <input type="checkbox" name="hid_check1" value="S">2.1. Limpar cisterna/caixa d'água<br>
        <i class="period">PERIODICIDADE ANUAL</i>
    </label>
    <!--<label>
        <input type="checkbox" name="hid_check2" value="S">2.2. Verificar estado geral dos reservatórios quanto a limpeza e aspecto da água, vedação e fixação das tampas, bóias e vazamentos<br>
        <i class="period">PERIODICIDADE ANUAL</i>
    </label>
    <label>
        <input type="checkbox" name="hid_check3" value="S">2.3. Verificar condições de abrigo executando pequenos reparos<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>-->

    <label>
        <input type="checkbox" name="hid_check4" value="S" <?=(@$session['hid_check4'] == "S")?"checked=\"checked\"":"";?>>2.1. Verificar estado geral de ralos, caixas de gordura e tubulações em geral dos sanitários e copa efetuando os reparos necessários<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="hid_check5" value="S" <?=(@$session['hid_check5'] == "S")?"checked=\"checked\"":"";?>>2.2. Verificar dispositivos de acionamento dos vasos sanitários<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="hid_check6" value="S" <?=(@$session['hid_check6'] == "S")?"checked=\"checked\"":"";?>>2.3. Verificar metais e acessórios defeituosos (sifões, torneiras, válvulas, grelhas de ralo, saboneteiras, espelhos, assentos, engates, etc)<br>
        <i class="period">PERIODICIDADE MESAL</i>
    </label>
    <label>
        <input type="checkbox" name="hid_check7" value="S" <?=(@$session['hid_check7'] == "S")?"checked=\"checked\"":"";?>>2.4. Verificação de vazamentos<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="hid_check8" value="S" <?=(@$session['hid_check8'] == "S")?"checked=\"checked\"":"";?>>2.5. Verificar funcionamento das torneiras e vazamentos dos bebedouros<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>


    <div class="ui-grid-a">
        <div class="ui-block-a">
            <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_2">Anterior</a>
        </div>
        <div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_4">Próximo</a>
        </div>
    </div><!-- /grid-a -->
</div>
<div data-role="footer" data-position="fixed">
    <h1>
        <center>
            <a class="numberCircle ok" href="#page_1">ID</a>
            <a class="numberCircle ok" href="#page_2">1</a>
            <a class="numberCircle" href="#page_3">2</a>
            <a class="numberCircle" href="#page_4">3</a>
            <a class="numberCircle" href="#page_5">4</a>
            <a class="numberCircle" href="#page_6">5</a>
            <a class="numberCircle" href="#page_7">6</a>
            <a class="numberCircle" href="#page_8">7</a>
            <!--<a class="numberCircle" href="#page_9">8</a>
            <!--<a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>-->
        </center>
    </h1>
</div>