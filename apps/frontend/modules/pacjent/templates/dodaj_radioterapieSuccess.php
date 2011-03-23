<form action="<?php echo url_for('pacjent_dodaj_radioterapie', $pacjent) ?>" method="post">
  <input type="hidden" name="sf_method" value="post" />
  <table>
    <?php echo $form ?>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="zapisz" />
        <a href="<?php echo url_for('pacjent_show', $pacjent) ?>">Anuluj</a>
      </td>
    </tr>
  </table>

</form>