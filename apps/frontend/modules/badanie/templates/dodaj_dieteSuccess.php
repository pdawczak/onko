<form action="<?php echo url_for('badanie_dodaj_diete', $badanie) ?>" method="post">

  <input type="hidden" name="sf_method" value="post"/>

  <table>

    <?php echo $form ?>

    <tr>
      <td></td>
      <td><input type="submit" value="Zapisz"/></td>
    </tr>
  </table>

</form>
