<h3>Papierosy</h3>
<?php if ($aktywnie = $badanie->getPapierosyAktywnie()) : ?>
  <b>Pali aktywnie</b><br/>
  Sztuk dziennie: <?php echo $aktywnie->getSztukiDziennie() ?><br/>
  Okres palenia: <?php echo $aktywnie->getOkresPalenia() ?><br/>
  Ostatni papieros: <?php echo $aktywnie->getOstatniPapieros() ?><br/>
  Data zaprzestania: <?php echo $aktywnie->getDateTimeObject('data_zaprzestania')->format('d-m-Y') ?>
<?php elseif ($biernie = $badanie->getPapierosyBiernie()) : ?>
  <b>Bierne palenie</b><br/>
  Miejsce narażenia: <?php echo $biernie->getMiejsceNarazenia() ?><br/>
  Czas ekspozycji: <?php echo $biernie->getCzasEkspozycji() ?><br/>
  Przed badaniem: <?php echo boolAsWord($biernie->getPrzedBadaniem()) ?>
<?php else : ?>
  <b>Nie pali</b>
<?php endif ?>