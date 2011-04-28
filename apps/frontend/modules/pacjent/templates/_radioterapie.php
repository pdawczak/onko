<?php if (count($pacjent->getSortedRadioterapie()) > 0) : ?>
  <!--<ul>-->
  <?php foreach ($pacjent->getSortedRadioterapie() as $radioterapia) : ?>
    <div class="cell-result-item">
      <div class="result-item-date">
        <?php echo myFormatDate($radioterapia->getDataRozpoczecia()) ?>
        <?php if ($radioterapia->getDataZakonczenia()) : ?>
          - <?php echo myFormatDate($radioterapia->getDataZakonczenia()) ?>
        <?php endif ?>
      </div>
      <div class="result-item-result">
        <ul>
	  <?php if ($radioterapia->getRodzajRadioterapii()->getNazwa()): ?>
	  <li>
	    Rodzaj:
	    <?php echo $radioterapia->getRodzajRadioterapii() ?>
	  </li>
	  <?php endif ?>
          <li>
            fr./total:
            <?php echo $radioterapia->getDawkaFr() ?> / <?php echo $radioterapia->getDawkaTotal() ?>
          </li>
          <li>
            Stereo: <?php echo myBooleanWord($radioterapia->getStereo()) ?>
          </li>
          <li>
            GTV/CTV/PTV:
            <?php echo $radioterapia->getGtv() ?>/<?php echo $radioterapia->getCtv() ?>/<?php echo $radioterapia->getPtv() ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="cell-result-cleaner"></div>
  <?php endforeach ?>
  <!--</ul>-->
<?php else : ?>
  <div class="result-item-result">
    Brak radioterapii
  </div>
<?php endif ?>
