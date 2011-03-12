<div style="padding:10px;">
  <?php echo $i ?>.<br/>
  Data badania: <?php echo $badanie->getDateTimeObject('data_badania')->format('d-m-Y') ?><br/>
  Ocena stanu guza: <?php //echo $badanie->getOcenaStanuGuzaSlowo() ?><br/>
  <?php echo link_to('Szczegóły', 'badanie_szczegoly', $badanie) ?>
</div>