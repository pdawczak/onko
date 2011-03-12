<?php

class myCechyCollectionForm extends BaseForm
{
  public function configure()
  {
    $labels = array();
    // Pola do sprawdzenia, w wypadku oznaczenia jako niewymagane (optional)
    $fields = array();

//    foreach ($this->getOption('cechy') as $cecha)
    foreach(TypCechyTable::getInstance()->myFindBySlugs($this->getOption('cechy')) as $typ_cechy)
    {
//      $typ_cechy = TypCechyTable::getInstance()->findOneBySlug($cecha, Doctrine_Core::HYDRATE_ARRAY);
      $slug = $this->slugify($typ_cechy->getSlug());
      
      $cecha_obj = new Cecha();
//      $cecha_obj->typ_cechy_id = $typ_cechy['id'];
      $cecha_obj->TypCechy = $typ_cechy;

      $cecha_frm = new CechaForm($cecha_obj);

      // Jeśli formularze mogą być opcjonalne - tutaj jego pola są oznaczane
      // jako nie wymagane
      if ($this->getOption('optional', false))
      {
        $cecha_frm->validatorSchema['wartosc']->setOption('required', false);
        // Pola typu bool nie będą oznaczone jako wymagane
//        if ('bool' != $typ_cechy['typ']) $fields[] = $slug;
        if ('bool' != $typ_cechy->getTyp()) $fields[] = $slug;
      }

      $this->embedForm($slug, $cecha_frm);
//      $labels[$slug] = $typ_cechy['nazwa'];
      $labels[$slug] = $typ_cechy->getNazwa();
    }

    // Tutaj sprawdzane jest - jeśli pola są opcjonalne, to wszystkie muszą zostać
    // puste, albo wypełnione
    if ($this->getOption('optional', false))
    {
      $validator = new myBlankFieldsValidatorSchema();
      $validator->addOption('fields', $fields);
      $this->mergePostValidator($validator);
    }

    $this->widgetSchema->setLabels($labels);
  }
}