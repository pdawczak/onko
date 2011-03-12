<?php

/**
 * Base project form.
 * 
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
  /**
   * Changes "text-with-dashes" to "text_with_dashes"
   * @param string $text
   * @return string
   */
  public function slugify($text)
  {
    return str_replace('-', '_', $text);
  }
}
