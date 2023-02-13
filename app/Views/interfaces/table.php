<?= $this->extend('templates/default') ?>
<?= $this->section('organism') ?>
<section class="section row">
<div class="col s11">
    <table class="bordered striped highlight">
    <thead>
        <tr>
            <th>Periodo</th>
            <th>Version</th>
            <th>UUID</th>
            <th>Subtotal</th>
            <th>IVA</th>
            <th>Total</th>
            <th>Metodo de pago</th>
            <th>Forma de pago</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $key => $value):?>
            <?php foreach($value as $_key => $_value):?>
            <tr style="background:<?= $_value->success ? 'white' : 'red' ?> " title="<?= $_value->file ?>">
                <td><?=$key?></td>
                <td><?=$_value->version?></td>
                <td><?=$_value->certificado?></td>
                <td><?=$_value->subtotal?></td>
                <td><?=$_value->impuesto?></td>
                <td><?=$_value->total?></td>
                <td><?=$_value->metodo?></td>
                <td><?=$_value->forma?></td>
                <td><?=$_value->fecha?></td>
            </tr>
            <?php $sumt += $_value->total ;  $sums += $_value->subtotal ;  $sumi += $_value->impuesto ?>
        <?php endforeach?>
            <tr class="light-blue lighten-2">
                <td colspan="3">Totales</td>
                <td><?=$sums?></td>
                <td><?=$sumi?></td>
                <td><?=$sumt?></td>
                <td colspan="3"></td>
            </tr>
        <?php $sumt = 0.0 ; $sums = 0.0 ; $sumi = 0.0; ?>
        <?php endforeach?>
    </tbody>
    </table>
</div>
<div class="col s1">
    <a class="waves-effect waves-light  btn" href="<?=base_url('test/export')?>"> Descargar </a>
</div>
</section>
<?= $this->endSection() ?> 