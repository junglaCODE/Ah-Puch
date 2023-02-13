<?= $this->extend('templates/default') ?>
<?= $this->section('organism') ?>
<div class="row" style="text-align: center;">
    <h3>Prototipo del Auditor de CFDI'S</h3>
    <p>Por el momento el algoritmo solo acepta directorios de profundidad 2 como el que se ve en la imagen
    Debe Comprimir el archivo desde windows. Por el momento la MACOSX no lo soporta por que crae bastante archivos temporales</p>
    <div class="row">
      <div class="col s6">    
        <img class="responsive-img center-align" src="<?= $imgtip?>" alt="depth2">
        </div>
      <div class="col s6">
        <video width="500" height="350" controls>
            <source src="https://demos.junglacode.org/dimici/_assets/tutorial.webm" type="video/webm">
        </video> 
      </div>
    </div>
    <form method="post" action="<?=$action?>" enctype="multipart/form-data" class="col s12" style="background: #d7d3d3;">
        <div class="row">
            <input type="file" name="declaration" id="_declaration">
        </div>
        <div class="row">
            <button type="submit" class="right-align">Analizar</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>  