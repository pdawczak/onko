<?php /* @var $badanie Badanie */ ?>
<style type="text/css">
  th {
/*    text-align: right;*/
    padding-right: 5px;
  }
</style>

<table>
  <tbody>
    <tr>
      <th>Data badania:</th>
      <td><?php echo myFormatDate($badanie->getDataBadania()) //$badanie->getDateTimeObject('data_badania')->format('d.m.Y') ?></td>
    </tr>
    <tr>
      <th>Ocena stanu guza:</th>
      <td>
        <?php if ($badanie->getHasWynikBadania()) : ?>
          <?php echo $badanie->getWynikBadania()->getOcenaStanuGuzaWord() ?>
	<?php else : ?>
          Brak wyników badania (<?php echo link_to('dodaj', 'badanie_dodaj_wynik_badania', $badanie) ?>)
	<?php endif ?>
      </td>
    </tr>
  </tbody>
</table>
