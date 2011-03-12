<h1>Wynik badanias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Ocena stanu guza</th>
      <th>Badanie</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($wynik_badanias as $wynik_badania): ?>
    <tr>
      <td><a href="<?php echo url_for('wynik/show?id='.$wynik_badania->getId()) ?>"><?php echo $wynik_badania->getId() ?></a></td>
      <td><?php echo $wynik_badania->getOcenaStanuGuza() ?></td>
      <td><?php echo $wynik_badania->getBadanieId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('wynik/new') ?>">New</a>
