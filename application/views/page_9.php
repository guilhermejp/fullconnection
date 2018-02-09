<div data-role="content" data-theme="a">
    <div class="header"><h3>PESQUISA DE QUALIDADE</h3></div>
    <h4>ENTREGAR PARA O GERENTE PREENCHER</h4>
    <div style="padding-left: 5px;">
        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Atendimento da Empresa</legend>
            <input type="radio" name="atendimento_radio" id="atendimento_radio_1" value="ÓTIMO">
            <label for="atendimento_radio_1">Ótimo</label>
            <input type="radio" name="atendimento_radio" id="atendimento_radio_2" value="BOM">
            <label for="atendimento_radio_2">Bom</label>
            <input type="radio" name="atendimento_radio" id="atendimento_radio_3" value="REGULAR">
            <label for="atendimento_radio_3">Regular</label>
            <input type="radio" name="atendimento_radio" id="atendimento_radio_4" value="INSATISFATÓRIO">
            <label for="atendimento_radio_4">Insatisfatório</label>
        </fieldset>
        <br>
        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Prestação de serviços / Qualidade da empresa</legend>
            <input type="radio" name="prestacao_radio" id="prestacao_radio_1" value="ÓTIMO">
            <label for="prestacao_radio_1">Ótimo</label>
            <input type="radio" name="prestacao_radio" id="prestacao_radio_2" value="BOM">
            <label for="prestacao_radio_2">Bom</label>
            <input type="radio" name="prestacao_radio" id="prestacao_radio_3" value="REGULAR">
            <label for="prestacao_radio_3">Regular</label>
            <input type="radio" name="prestacao_radio" id="prestacao_radio_4" value="INSATISFATÓRIO">
            <label for="prestacao_radio_4">Insatisfatório</label>
        </fieldset>
        <br>
        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Agilidade da Empresa</legend>
            <input type="radio" name="agilidade_radio" id="agilidade_radio_1" value="ÓTIMO">
            <label for="agilidade_radio_1">Ótimo</label>
            <input type="radio" name="agilidade_radio" id="agilidade_radio_2" value="BOM">
            <label for="agilidade_radio_2">Bom</label>
            <input type="radio" name="agilidade_radio" id="agilidade_radio_3" value="REGULAR">
            <label for="agilidade_radio_3">Regular</label>
            <input type="radio" name="agilidade_radio" id="agilidade_radio_4" value="INSATISFATÓRIO">
            <label for="agilidade_radio_4">Insatisfatório</label>
        </fieldset>
        <br>
        <fieldset data-role="controlgroup" data-type="horizontal"><legend>Foram prestados todos os serviços solicitados?</legend>
            <input type="radio" name="todos_radio" id="todos_radio_1" value="SIM">
            <label for="todos_radio_1">SIM</label>
            <input type="radio" name="todos_radio" id="todos_radio_2" value="NÃO">
            <label for="todos_radio_2">NÃO</label>
        </fieldset>
    </div>
    <br>
    <div style="padding-left: 5px;">
        <label for="textarea">Em caso negativo, por quê? (falta de material, andaime, etc.)</label>
        <textarea name="mensagem_negativo" ></textarea>
    </div>
    <div style="padding-left: 5px;">
        <label for="textarea">Em que horário a equipe foi liberada?</label>
        <input type="time" name="hora_equipe_liberada">
    </div>
    <br>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_8">Anterior</a>
        </div>
        <!--<div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_10">Próximo</a>
        </div>-->
        <div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r submit" href="#">Finalizar</a>
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
            <a class="numberCircle ok" href="#page_5">4</a>
            <a class="numberCircle ok" href="#page_6">5</a>
            <a class="numberCircle ok" href="#page_7">6</a>
            <a class="numberCircle ok" href="#page_8">7</a>
            <a class="numberCircle" href="#page_9">8</a>
            <!--<a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>-->
        </center>
    </h1>
</div>