<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $wynik_badania->getId() ?></td>
    </tr>
    <tr>
      <th>Ocena stanu guza:</th>
      <td><?php echo $wynik_badania->getOcenaStanuGuza() ?></td>
    </tr>
    <tr>
      <th>Badanie:</th>
      <td><?php echo $wynik_badania->getBadanieId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('wynik/edit?id='.$wynik_badania->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('wynik/index') ?>">List</a>
