<div data-role="content" data-theme="a">
    <div class="header"><h3>AR CONDICIONADO</h3></div>
    
    <div data-role="collapsibleset" data-content-theme="a" data-iconpos="right" id="div-ar-group">
        <?php
        if(!is_object($facilities)){
            $facilities = json_decode($facilities);   
        }
        $qtde_ar_condicionado = 0;
        if($facilities->ac != false){
            foreach ($facilities->ac as $ind => $ac) {
                echo '<br>' .
                        '<div data-role="collapsible" id="set1" data-collapsed="true">' .
                        '<h3>' . $ac->name . ' <small><i>clique para expandir/recolher</i></small></h3>' .
                        '<input type="hidden" name="ar_desc['.$ind.']" value="' . $ac->name . '">' .
                        '<p>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-right: 5px;">' .
                        '        Tipo<br>' .
                        '        <input type="text" name="ar_tipo['.$ind.']" value="' . $ac->type . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Marca<br>' .
                        '        <input type="text" name="ar_marca['.$ind.']" value="' . $ac->brand . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-left: 5px;">' .
                        '        Localização e andar<br>' .
                        '        <input type="text" name="ar_local['.$ind.']" value="' . $ac->site . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Capacidade<br>' .
                        '        <input type="text" name="ar_capacidade['.$ind.']" value="' . $ac->capacity . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-right: 5px;">' .
                        '        Tensão (V)<br>' .
                        '        <input type="text" name="ar_tensao['.$ind.']" value="' . $ac->volts . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Modelo<br>' .
                        '        <input type="text" name="ar_modelo['.$ind.']" value="' . $ac->model . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-left: 5px;">' .
                        '        Número de Série<br>' .
                        '        <input type="text" name="ar_serie['.$ind.']" value="' . $ac->serial_number . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        Setor que atende<br>' .
                        '        <input type="text" name="ar_setor['.$ind.']" value="' . $ac->sector . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<div class="ui-grid-a">' .
                        '    <div class="ui-block-a" style="padding-right: 5px;">' .
                        '        Nº pessoas no setor<br>' .
                        '        <input type="text" name="ar_pessoas['.$ind.']" value="' . $ac->people_sector . '" readonly="readonly">' .
                        '    </div>' .
                        '    <div class="ui-block-b" style="padding-left: 5px;">' .
                        '        M² atendidos<br>' .
                        '        <input type="text" name="ar_m2['.$ind.']" value="' . $ac->square_meter . '" readonly="readonly">' .
                        '    </div>' .
                        '</div>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check1['.$ind.']" value="S" '.((@$session["ar_check1[$ind]"] == "S")?"checked=\"checked\"":"").'>5.1. Verificar e limpar filtros de ar<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check2['.$ind.']" value="S" '.((@$session["ar_check2[$ind]"] == "S")?"checked=\"checked\"":"").'>5.2. Limpar/desobstruir drenos<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check3['.$ind.']" value="S" '.((@$session["ar_check3[$ind]"] == "S")?"checked=\"checked\"":"").'>5.3. Verificar pressão de alta e baixa<br>' .
                        '    <i class="period">PERIODICIDADE SEMESTRAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check4['.$ind.']" value="S" '.((@$session["ar_check4[$ind]"] == "S")?"checked=\"checked\"":"").'>5.4. Verificar vedação dos painéis<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check5['.$ind.']" value="S" '.((@$session["ar_check5[$ind]"] == "S")?"checked=\"checked\"":"").'>5.5. verificar vibração no equipamento<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check6['.$ind.']" value="S" '.((@$session["ar_check6[$ind]"] == "S")?"checked=\"checked\"":"").'>5.6. Verificar e limpar condensador<br>' .
                        '    <i class="period">PERIODICIDADE ANUAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check7['.$ind.']" value="S" '.((@$session["ar_check7[$ind]"] == "S")?"checked=\"checked\"":"").'>5.7. Verificar e limpar serpentina<br>' .
                        '    <i class="period">PERIODICIDADE ANUAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check8['.$ind.']" value="S" '.((@$session["ar_check8[$ind]"] == "S")?"checked=\"checked\"":"").'>5.8. Verificar vedação carenagem<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check9['.$ind.']" value="S" '.((@$session["ar_check9[$ind]"] == "S")?"checked=\"checked\"":"").'>5.9. Verificar nível de gás<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check10['.$ind.']" value="S" '.((@$session["ar_check10[$ind]"] == "S")?"checked=\"checked\"":"").'>5.10. Verificar vazamentos<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check11['.$ind.']" value="S" '.((@$session["ar_check11[$ind]"] == "S")?"checked=\"checked\"":"").'>5.11. Medir corrente<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check12['.$ind.']" value="S" '.((@$session["ar_check12[$ind]"] == "S")?"checked=\"checked\"":"").'>5.12. Verificar atuação do termostato<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check13['.$ind.']" value="S" '.((@$session["ar_check13[$ind]"] == "S")?"checked=\"checked\"":"").'>5.13. Medir tensão elétrica da alimentação<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check14['.$ind.']" value="S" '.((@$session["ar_check14[$ind]"] == "S")?"checked=\"checked\"":"").'>5.14. Medir temperatura do ar ambiente<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check15['.$ind.']" value="S" '.((@$session["ar_check15[$ind]"] == "S")?"checked=\"checked\"":"").'>5.15. Testar funcionamento dos controles remotos<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '<label>' .
                        '    <input type="checkbox" name="ar_check16['.$ind.']" value="S" '.((@$session["ar_check16[$ind]"] == "S")?"checked=\"checked\"":"").'>5.16. Tensão no Motor<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '        Valor Tensão<input type="text" name="ar_16['.$ind.']" value="'.@$session["ar_16[$ind]"].'">'.
                        '<label>' .
                        '    <input type="checkbox" name="ar_check17['.$ind.']" value="S" '.((@$session["ar_check17[$ind]"] == "S")?"checked=\"checked\"":"").'>5.17. Corrente no Motor<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .
                        '        Valor Corrente<input type="text" name="ar_17['.$ind.']" value="'.@$session["ar_17[$ind]"].'">'.
                        /*'<label>' .
                        '    <input type="checkbox" name="ar_check16['.$ind.']" value="S">5.16. Verificar carga de gás refrigerante<br>' .
                        '    <i class="period">PERIODICIDADE MENSAL</i>' .
                        '</label>' .*/
                        '</p>' .
                        '</div>';
                $qtde_ar_condicionado++;
            }
        }
        ?>
    </div>
    <input type="hidden" name="qtde_ar_condicionado" id="qtde_ar_condicionado" value="<?=$qtde_ar_condicionado;?>">
    <br>
    <!--<a class="ui-btn add-ar-condicionado" href="#">Adicionar Ar Condicionado</a>-->
    <br>
    <br>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <?php if($client->temp_only_ar != "1"){ ?>
                <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_6">Anterior</a>
            <?php }else{ ?>
                <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_1">Anterior</a>
            <?php } ?>
        </div>
        <div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_7">Próximo</a>
        </div>
    </div><!-- /grid-a -->
</div>
<div data-role="footer" data-position="fixed">
    <h1>
        <center>
            <a class="numberCircle ok" href="#page_1">ID</a>
            <?php if($client->temp_only_ar != "1"){ ?>
            <a class="numberCircle ok" href="#page_2">1</a>
            <a class="numberCircle ok" href="#page_3">2</a>
            <a class="numberCircle ok" href="#page_4">3</a>
            <a class="numberCircle ok" href="#page_5">4</a>
            <?php } ?>
            <a class="numberCircle" href="#page_6">5</a>
            <a class="numberCircle" href="#page_7">6</a>
            <a class="numberCircle" href="#page_8">7</a>
            <!--<a class="numberCircle" href="#page_9">8</a>
            <!--<a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>-->
        </center>
    </h1>
</div>