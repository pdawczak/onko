<?php if (! $wynik->getWidma()) : ?>
  <div class="result-item-result">
    Brak widm (<?php echo link_to('Dodaj widmo', 'dodaj_widmo', $wynik) ?>)
  </div>
<?php else : ?>
  <?php foreach ($wynik->getWidma() as $widmo) : ?>
    <div class="cell-result-item">
      <ul>
        <li>
          <?php echo $widmo->getLokalizacja() ?>
        </li>
        <li>
          Rozmiar voxela [x/y/z]: 
          <?php 
            echo sprintf('%s/%s/%s', 
              $widmo->getRozmiarVoxelaX(), 
              $widmo->getRozmiarVoxelaY(), 
              $widmo->getRozmiarVoxelaZ()
            ) 
          ?>
        </li>
        <li>
          [te/tr/ns]:
          <?php 
            echo sprintf('%s/%s/%s',
              $widmo->getTe(),
              $widmo->getTr(),
              $widmo->getNs()
            ) 
          ?>
        </li>
      </ul>
    </div>
    <div class="cell-result-cleaner"></div>
  <?php endforeach ?>
<?php endif ?>
