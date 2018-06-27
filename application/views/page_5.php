<div data-role="content" data-theme="a">
    <div class="header"><h3>QUADROS ELÉTRICOS</h3></div>
    <div data-role="collapsibleset" data-content-theme="a" data-iconpos="right" id="div-quadro-group">
        <?php
        $facilities = json_decode($facilities);
        
        $qtde_quadros_eletricos=0;
        if($facilities->ep != false){
            foreach($facilities->ep as $ind=>$qe){
                echo '<br>' .
                        '<div data-role="collapsible" id="set1" data-collapsed="true">' .
                        '<h3>' . $qe->name . ' <small><i>clique para expandir/recolher</i></small></h3>' .
                        '<input type="hidden" name="qe_desc['.$ind.']" value="' . $qe->name . '">' .
                        '<p>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-right: 5px;">' .
                        '        Tipo<br>' .
                        '        <input type="text" name="qe_tipo['.$ind.']" value="' . $qe->type . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Disj entrada<br>' .
                        '        <input type="text" name="qe_disj['.$ind.']" value="' . $qe->switch . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-left: 5px;">' .
                        '        Local<br>' .
                        '        <input type="text" name="qe_local['.$ind.']" value="' . $qe->site . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Andar<br>' .
                        '        <input type="text" name="qe_andar['.$ind.']" value="' . $qe->floor . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check1['.$ind.']" value="S" '.((@$session["qe_check1[$ind]"] == "S")?"checked=\"checked\"":"").'>4.1. Verificar estado geral e condições<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check2['.$ind.']" value="S" '.((@$session["qe_check2[$ind]"] == "S")?"checked=\"checked\"":"").'>4.2. Realizar limpeza interna e externa<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        /*'<label>' .
                        '    <input type="checkbox" name="qe_check3['.$ind.']" value="S">4.3. Limpar painel frontal<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .*/
                        '' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check4['.$ind.']" value="S" '.((@$session["qe_check4[$ind]"] == "S")?"checked=\"checked\"":"").'>4.3. Verificar chaves/botoeiras<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check5['.$ind.']" value="S" '.((@$session["qe_check5[$ind]"] == "S")?"checked=\"checked\"":"").'>4.4. Verificar identificação dos cirtuitos<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check6['.$ind.']" value="S" '.((@$session["qe_check6[$ind]"] == "S")?"checked=\"checked\"":"").'>4.5. Verificar Superaquecimento de cabos<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check7['.$ind.']" value="S" '.((@$session["qe_check7[$ind]"] == "S")?"checked=\"checked\"":"").'>4.6. Reapertar parafusos de conexões elétricas<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check8['.$ind.']" value="S" '.((@$session["qe_check8[$ind]"] == "S")?"checked=\"checked\"":"").'>4.7. Verificar fiações, barramentos e sistema de aterramento<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="qe_check9['.$ind.']" value="S" '.((@$session["qe_check9[$ind]"] == "S")?"checked=\"checked\"":"").'>4.8. Medição de tensão<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<div class="ui-grid-b">'.
                        '    <div class="ui-block-a" style="padding-right: 5px;">'.
                        '        RS<input type="text" name="qe_9_rs['.$ind.']" value="'.@$session["qe_9_rs[$ind]"].'">'.
                        '    </div>'.
                        '    <div class="ui-block-b" style="padding-left: 5px;">'.
                        '        ST<input type="text" name="qe_9_st['.$ind.']" value="'.@$session["qe_9_st[$ind]"].'">'.
                        '    </div>'.
                        '    <div class="ui-block-c" style="padding-left: 5px;">'.
                        '        RT<input type="text" name="qe_9_rt['.$ind.']" value="'.@$session["qe_9_rt[$ind]"].'">'.
                        '    </div>'.
                        '</div>'.
                        '<label>' .
                        '    <input type="checkbox" name="qe_check10['.$ind.']" value="S" '.((@$session["qe_check10[$ind]"] == "S")?"checked=\"checked\"":"").'>4.9. Medição de corrente<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<div class="ui-grid-b">'.
                        '    <div class="ui-block-a" style="padding-right: 5px;">'.
                        '        R<input type="text" name="qe_10_r['.$ind.']" value="'.@$session["qe_10_r[$ind]"].'">'.
                        '    </div>'.
                        '    <div class="ui-block-b" style="padding-left: 5px;">'.
                        '        S<input type="text" name="qe_10_s['.$ind.']" value="'.@$session["qe_10_s[$ind]"].'">'.
                        '    </div>'.
                        '    <div class="ui-block-c" style="padding-left: 5px;">'.
                        '        T<input type="text" name="qe_10_t['.$ind.']" value="'.@$session["qe_10_t[$ind]"].'">'.
                        '    </div>'.
                        '</div>'.
                        '</p>' .
                        '</div>';
                $qtde_quadros_eletricos++;
            }
        }
        ?>
    </div>
    <input type="hidden" name="qtde_quadros_eletricos" id="qtde_quadros_eletricos" value="<?=$qtde_quadros_eletricos?>">
    <br>
    <!--<a class="ui-btn add-quadro" href="#">Adicionar Quadro Elétrico</a>-->
    <br>

    <br>
    <!--<div class="ui-grid-a">
        <div class="ui-block-a" style="padding-right: 5px;">
            Tipo<br>
            <input type="text" name="tipo">
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Disj entrada<br>
            <input type="text" name="disj_entrada">
        </div>
    </div>
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-left: 5px;">
            Local<br>
            <input type="text" name="local">
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Andar<br>
            <input type="text" name="andar">
        </div>
    </div>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.1. Verificar estado geral e condições<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.2. Realizar limpeza interna e externa<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.3. Limpar painel frontal<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>

    <label>
        <input type="checkbox" name="checkbox-0 ">4.4. Verificar chaves/botoeiras<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.5. Verificar identificação dos cirtuitos<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.6. Verificar Superaquecimento de cabos<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.7. Reapertar parafusos de conexões elétricas<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    <label>
        <input type="checkbox" name="checkbox-0 ">4.8. Verificar fiações, barramentos e sistema de aterramento<br>
        <i class="period">PERIODICIDADE MENSAL</i>
    </label>
    -->
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_4">Anterior</a>
        </div>
        <div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_6">Próximo</a>
        </div>
    </div><!-- /grid-a -->
</div>
<div data-role="footer" data-position="fixed">
    <h1>
        <center>
            <a class="numberCircle ok" href="#page_1">ID</a>
            <a class="numberCircle ok" href="#page_2">1</a>
            <a class="numberCircle ok" href="#page_3">2</a>
            <a class="numberCircle ok" href="#page_4">3</a>
            <a class="numberCircle" href="#page_5">4</a>
            <a class="numberCircle" href="#page_6">5</a>
            <a class="numberCircle" href="#page_7">6</a>
            <a class="numberCircle" href="#page_8">7</a>
            <!--<a class="numberCircle" href="#page_9">8</a>
            <!--<a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>-->
        </center>
    </h1>
</div>