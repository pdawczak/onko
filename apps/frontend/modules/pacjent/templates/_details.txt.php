<?php echo $pacjent."\n" ?>

PESEL:            <?php echo $pacjent->getPesel()."\n" ?>
Data urodzenia:   <?php echo $pacjent->getDateTimeObject('data_urodzenia')->format('d-m-Y')."\n" ?>
Wzrost [cm]:      <?php echo $pacjent->getWzrost()."\n" ?>
Waga [kg]:        <?php echo $pacjent->getWaga()."\n" ?>
Ręka dominująca:  <?php echo $pacjent->getRekaSlowo()."\n" ?>
Dodano:           <?php echo $pacjent->getDateTimeObject('created_at')->format('d-m-Y')."\n" ?>
