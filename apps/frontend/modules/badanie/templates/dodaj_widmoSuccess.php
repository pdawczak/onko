<form action="<?php echo url_for('dodaj_widmo', $wynik) ?>" method="post" method="post" enctype="multipart/form-data">

  <input type="hidden" name="sf_method" value="post"/>

  <table>

    <?php echo $form ?>

    <tr>
      <td></td>
      <td><input type="submit" value="Zapisz"/></td>
    </tr>
  </table>

</form>
