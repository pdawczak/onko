<?php if (count($pacjent->getSortedChemioterapie()) > 0) : ?>
  <?php foreach ($pacjent->getSortedChemioterapie() as $chemioterapia) : ?>
    <div class="cell-result-item">
      <div class="result-item-date">
        <?php echo myFormatDate($chemioterapia->getDataRozpoczecia()) ?>
        <?php if ($chemioterapia->getDataZakonczenia()) : ?>
          - <?php echo myFormatDate($chemioterapia->getDataZakonczenia()) ?>
        <?php endif ?>
      </div>
      <div class="result-item-result">
        <ul>
          <li>
            Lek:
            <?php echo $chemioterapia->getLek() ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="cell-result-cleaner"></div>
  <?php endforeach ?>
<?php else : ?>
  Brak chemioterapii
<?php endif ?>
