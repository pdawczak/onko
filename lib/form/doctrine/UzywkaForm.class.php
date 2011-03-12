<?php

/**
 * Uzywka form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UzywkaForm extends BaseUzywkaForm
{
  public function configure()
  {
    $this->useFields(array('typ'));
    $this->widgetSchema['typ'] = new sfWidgetFormInputHidden();
  }

  public function embedCechyCollectionForm(array $fields, $optional = false)
  {
    $cechy = new myCechyCollectionForm(null, array(
      'cechy'     => $fields,
      'optional'  => $optional
    ));

    $this->embedForm('Cechy', $cechy);
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    if (null === $forms)
    {
      $forms = $this->embeddedForms;
    }

    foreach ($forms as $form)
    {
      if ($form instanceof sfFormObject)
      {
        // Sprawdzanie Cech
        $form->saveEmbeddedForms($con);
        $obj = $form->getObject();
        if (!$obj->getUzywkaId())
        {
          // Nie jest zapisywany formularz, który nie ma
          // jeszcze przypisanego id Używki
          continue;
        }
        $obj->save($con);
      }
      else
      {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }
}
