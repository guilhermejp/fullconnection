<div data-role="content" data-theme="a">
    <div class="header"><h3>MATERIAIS UTILIZADOS NA PREVENTIVA</h3></div>
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-right: 5px;">
            Material
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            Quantidade
        </div>
    </div><!-- /grid-a -->
    <input type="hidden" id="qtde_material" name="qtde_material">
    <div class="ui-grid-a">
        <div class="ui-block-a" style="padding-left: 5px;">
            <input type="text" name="mat_mat[]">
        </div>
        <div class="ui-block-b" style="padding-left: 5px;">
            <input type="text" name="mat_qtde[]">
        </div>
    </div>
    <a class="ui-btn add-material" href="#">Adicionar Material</a>
    <br>
    <div style="padding-left: 5px;">
        <label for="textarea">Extras</label>
        <textarea name="extras"></textarea>
    </div>
    <br>
    <div style="padding-left: 5px;" class="div_comprovantes">
        <label for="textarea">Comprovantes</label>
        <input type="file" name="comprovante[]" class="comprovante">
        <a class="ui-btn add-comprovante" href="#">Adicionar Comprovante</a>
    </div>
    <br>
    <div class="ui-grid-a">
        <div class="ui-block-a">
            <a class="ui-btn ui-btn-icon-left ui-icon-carat-l" href="#page_6">Anterior</a>
        </div>
        <div class="ui-block-b">
            <a class="ui-btn ui-btn-icon-right ui-icon-carat-r" href="#page_8">Próximo</a>
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
            <a class="numberCircle" href="#page_7">6</a>
            <a class="numberCircle" href="#page_8">7</a>
            <a class="numberCircle" href="#page_9">8</a>
            <a class="numberCircle" href="#page_10" style="margin-right: 0px;">9</a>
        </center>
    </h1>
</div>