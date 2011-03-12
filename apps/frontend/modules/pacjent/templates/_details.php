<style type="text/css">
  th {
/*    text-align: right;*/
    padding-right: 5px;
  }
</style>
<table>
  <tbody>
    <tr>
      <th collspan="2"><big><?php echo $pacjent ?></big></th>
    </tr>
    <tr>
      <th>PESEL:</th>
      <td><?php echo $pacjent->getPesel() ?></td>
    </tr>
    <tr>
      <th>Data urodzenia:</th>
      <td><?php echo $pacjent->getDateTimeObject('data_urodzenia')->format('d-m-Y') ?></td>
    </tr>
    <tr>
      <th>Wzrost:</th>
      <td><?php echo $pacjent->getWzrost() ?> [cm]</td>
    </tr>
    <tr>
      <th>Waga:</th>
      <td><?php echo $pacjent->getWaga() ?> [kg]</td>
    </tr>
    <tr>
      <th>Ręka dominująca:</th>
      <td><?php echo $pacjent->getRekaSlowo() ?></td>
    </tr>
    <tr>
      <th>Dodano:</th>
      <td><?php echo $pacjent->getDateTimeObject('created_at')->format('d-m-Y') ?></td>
    </tr>
  </tbody>
</table>