<style type="text/css">
  thead td {
    padding-top: 20px;
    font-weight: bold;
  }
  .better-reading td {
    border-bottom: 1px solid blue;
  }
</style>
<div class="cell-result-item">
<?php if (! $badanie->getHasDieta()) : ?>
  Brak danych.<br/>
  <?php echo link_to('Dodaj dietę', 'badanie_dodaj_diete', $badanie) ?>
<?php else : ?>
  <table>
    <tr><td>Bezmięsna:</td><td><?php echo myBooleanImage($badanie->getDieta()->getBezmiesna()) ?></td></tr>
    <tr><td>Zróżnicowana:</td></td><td><?php echo myBooleanImage($badanie->getDieta()->getZroznicowana()) ?></td></tr>
  </table>
  <table>
    <thead>
      <tr>
        <td collspan="2">
	  Produkty:
	</td>
      </tr>
    </thead>
    <tbody class="better-reading">
    <?php foreach ($badanie->getDieta()->getProdukty() as $produkt) : ?>
      <tr><td class="label"><?php echo $produkt->getProdukt() ?></td><td><?php echo myBooleanImage($produkt->getDuzaIlosc()) ?></td></tr>
    <?php endforeach ?>
    </tbody>
  </table>
<?php endif ?>
</div>
