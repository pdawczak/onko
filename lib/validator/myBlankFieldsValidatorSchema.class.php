<?php

class myBlankFieldsValidatorSchema extends sfValidatorSchema
{
  protected function doClean($values)
  {
    $errorSchema = new sfValidatorErrorSchema($this);
    $fields = $this->getOption('fields');

    foreach ($fields as $field)
    {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);
      
      // Sprawdzenie czy wartość istnieje
      if (!$values[$field]['wartosc'] || '' == trim($values[$field]['wartosc']))
      {
        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'wartosc');
        $errorSchema->addError($errorSchemaLocal, $field);
      }
    }

    // To znaczy że wszystkie pola są puste
    if (count($errorSchema) == count($fields))
    {
      $values = null;
    }
    // niektóre pola są wypełnione
    else if (0 < count($errorSchema))
    {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }
    // Jeżeli żaden z powyższych warunków nie jest prawdziwy,
    // to znaczy że wszystkie wymagane pola są wypełnione

    return $values;
  }
}