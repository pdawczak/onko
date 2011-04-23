<form action="<?php echo url_for('badanie_dodaj_wynik_badania', $badanie) ?>" method="post" enctype="multipart/form-data">

  <input type="hidden" name="sf_method" value="post"/>

  <table>

    <?php echo $form ?>

    <tr>
      <td></td>
      <td><input type="submit" value="Zapisz"/></td>
    </tr>
  </table>

</form>
