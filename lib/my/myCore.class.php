<?php

class myCore
{
  /**
   * Creates sfDoctrinePager
   * @param string $model
   * @param Doctrine_Query $query
   * @param int $start
   * @param int $limit
   * @return sfDoctrinePager
   */
  public static function createPager($model, $query, $start = 0, $limit = 20)
  {
    $pager = new sfDoctrinePager(
        $model,
        $limit
    );
    $pager->setQuery($query);
    $pager->setPage($start);
    $pager->init();

    return $pager;
  }

  /**
   * Processes form for ExtJS ajax calls
   * @param sfForm $form
   * @param sfWebRequest $request
   * @param string $name
   * @param string $route
   * @return string JSON necoded values
   */
  public static function processFormWithRequest(sfForm $form, sfWebRequest $request, $name, $route)
  {
    $values = $request->getParameter($name);
    return self::processFormWithValues($form, $values, $route);
  }

  public static function processFormWithValues(sfForm $form, array $values, $route)
  {
    $form->bind($values);

    if ($form->isValid())
    {
      $form->save();
      $result = array(
        'success' => true,
        'msg'     => 'Formularz poprawnie wypełniony',
        'url'     => sfContext::getInstance()->getRouting()->generate($route, $form->getObject())
      );
    }
    else
    {
      // pobieranie nazw pól
//      $fields = array_keys($values);
//      foreach ($fields as $field)
//      {
//        $item = $form[$field];
//        if ($item->hasError())
//        {
//          echo $field.'::'.$item->getError()->__toString()."\n";
//        }
//      }
//      die('pfff');
      // pobieranie formatowania atrybutu "name"
      
      // pobieranie errorów dla konkretnych pól
      $errors = array();
//      foreach ($fields as $label)
//      {
//        $item = $form[$label];
//        if ($item->hasError())
//        {
//          $errors[sprintf($formatter, $label)] = $item->getError()->__toString();
//        }
//      }

      $formatter = $form->getWidgetSchema()->getNameFormat();
      foreach ($form as $label => $item)
      {
        if ($item->hasError())
        {
          $error = $item->getError()->__toString();
          $error_label = sprintf($formatter, $label);
          
          // Dla formularzy z niezagnieżdżonymi podformularzami
          if (!strpos($error, '['))
          {
            $errors[$error_label] = $error;
          }
          else
          {
            $begin = substr($error, 0, strpos($error, ' '));
          
            // Usunięcie z tekstu "początku", który trafi do formattera
            $error = str_replace($begin.' ', '', $error);
            // Odcięcie początkowego znaku "[" i ostatniego "]"
            $error = substr($error, 1, strlen($error)-2);
            
            // Wydzielenie errorów dla kilku pól
            $tmp = explode('] ', $error);

            $error_label .= $begin ? '['.$begin.']' : '';

            foreach ($tmp as $val)
            {
              // Początek formatowania nazwy pola
              $append = '';
              $error = self::_extractErrorMessage($val);
              $append = str_replace('['.$error, '', $val);
              $append = str_replace(']', '', $append);
              $append = '['.trim(str_replace(' [', '][', $append)).']';
              // Koniec formatowania nazwy pola
              
              // Dodanie do tablicy treści errora
              $errors[$error_label.$append] = $error;
            }
          }
        }
      }
      
//$errors = self::getErrorsFor($form, $form, $values);
      $result = array(
        'success' => false,
        'msg'     => 'Proszę wprowadzić poprawne dane',
        'errors'  => $errors,
        'global'  => $form->renderGlobalErrors()
      );
    }

    return json_encode($result);
  }

  private static function _extractErrorMessage($string)
  {
    $string = str_replace(']', '', $string);
    $error = '';
    for ($i = strlen($string)-1; $i >= 0; $i--)
    {
      $char = $string[$i];
      if ('[' == $char) break;
      $error = $char.$error;
    }
    return $error;
  }

  public static function getErrorsFor(sfForm $base, sfForm $form, $values, $prefix = '')
  {
    foreach ($base as $name => $field)
    {
      echo $name."\n";
    }
//    die("KONIEC");
//    $form->bind($values);

//    echo $prefix."\n";
//    var_dump($values);
//    echo "\n\n\n";

    $local_prfx = null;
    if ('' == $prefix)
    {
      $local_prfx = $form->getWidgetSchema()->getNameFormat();
    }
    
    foreach ($form as $name => $item)
    {
      $cls = get_class($item);
      if (!empty ($local_prfx))
      {
        $tmp_prefix = sprintf($local_prfx, $name);
      }
      else
      {
        $tmp_prefix = $prefix.'['.$name.']';
      }
//echo $tmp_prefix.'::'.$item->getName().'=>'.$item->getValue()."\n";
      if ('sfFormField' == $cls)
      {
        $tmp_item = $form[$name];
        echo $tmp_item."\n";
//        echo $tmp_prefix.'::'.$name."\n";
        if ($tmp_item->hasError())
        {

//          $errors[$name_formatted] = ($item->getError()->__toString());
          echo $tmp_prefix.'::'.$tmp_item->getError()->__toString();
        }
      }
      else
      {
        $frm_temp = $form->getEmbeddedForm($name);
//        echo "\t".$tmp_prefix."\n";
//        echo $prefix.': '.get_class($frm_temp).':: '.$frm_temp->getName()."\n";
        $tmp_values = isset ($values[$name]) ? $values[$name] : null;
        self::getErrorsFor($base, $frm_temp, $tmp_values, $tmp_prefix);
      }
    }
  }

  public static function getFormHelper($name)
  {
    if ('Alkohol' == $name)
    {
      return new myAlkohol();
    }
    elseif ('Narazenie' == $name)
    {
      return new myBiernePalenie();
    }
    elseif ('Papierosy' == $name)
    {
      return new myAktywnePalenie();
    }
    elseif ('Inne' == substr($name, 0, 4))
    {
      return new myInneUzywki();
    }
    elseif ('Cechy' == $name)
    {
      return new CechaForm();
    }
  }
}
