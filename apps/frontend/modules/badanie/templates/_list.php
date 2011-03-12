<?php if (count($badania) > 0) : ?>
  <?php $i = 1; foreach ($badania as $badanie) : ?>

    <?php include_partial('pacjent/badanie_cell', array('badanie' => $badanie, 'i' => $i)) ?>
    <?php $i++ ?>

  <?php endforeach ?>
<?php else : ?>

  <p>Pacjent nie miał wykonywanych badań kontrolnych</p>

<?php endif ?>