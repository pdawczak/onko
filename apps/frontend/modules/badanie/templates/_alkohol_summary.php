<h3>Alkohol</h3>
Jednostek na tydzień: <?php echo $alkohol->getJednostekNaTydzien() ?><br/>
Przed badaniem: <?php echo boolAsWord($alkohol->getPrzedBadaniem()) ?><br/>
Data zaprzestania: <?php echo $alkohol->getDateTimeObject('data_zaprzestania')->format('d-m-Y') ?>