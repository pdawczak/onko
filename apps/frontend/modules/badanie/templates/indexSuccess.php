<h1>Badanies List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Pacjent</th>
      <th>Data badania</th>
      <th>Inne</th>
      <th>Menstruacja</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($badanies as $badanie): ?>
    <tr>
      <td><a href="<?php echo url_for('badanie/show?id='.$badanie->getId()) ?>"><?php echo $badanie->getId() ?></a></td>
      <td><?php echo $badanie->getPacjentId() ?></td>
      <td><?php echo $badanie->getDataBadania() ?></td>
      <td><?php echo $badanie->getInne() ?></td>
      <td><?php echo $badanie->getMenstruacja() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('badanie/new') ?>">New</a>
