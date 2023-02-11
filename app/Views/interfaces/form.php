<?= $this->extend('templates/default') ?>
<?= $this->section('organism') ?>
<div class="row" style="text-align: center;">
    <h3>Prototipo del Auditor de CFDI'S</h3>
    <p>Por el momento el algoritmo solo acepta directorios de profundidad 3 como el que se ve en la imagen</p>
    <img src="<?=base_url(ASSETS_IMAGES)?>/primera-fase.png" alt="depth 3" style="width: 58%;">
    <form method="post" action="<?=$action?>" enctype="multipart/form-data" class="col s12">
        <div class="row">
            <input type="file" name="declaration" id="_declaration">
        </div>
        <div class="row">
            <button type="submit" class="right-align">Analizar</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>  