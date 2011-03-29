<form action="<?php echo url_for('pacjent_dodaj_chemioterapie', $pacjent) ?>" method="post">
  <table>
    <?php echo $form ?>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Zapisz" />
        <a href="<?php echo url_for('pacjent_show', $pacjent) ?>">Anuluj</a>
      </td>
    </tr>
  </table>
</form>
