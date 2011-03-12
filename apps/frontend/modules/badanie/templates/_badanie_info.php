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
      <td><?php echo $badanie->getDateTimeObject('data_badania')->format('d.m.Y') ?></td>
    </tr>
    <tr>
      <th>Ocena stanu guza:</th>
      <td><?php echo $badanie->getWynikBadania()->getOcenaStanuGuzaWord() ?></td>
    </tr>
  </tbody>
</table>