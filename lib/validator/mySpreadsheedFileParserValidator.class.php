<?php

class mySpreadsheedFileParserValidator extends sfValidatorBase
{
  protected function doClean($value)
  {
    return Widmo::parseSpreadsheet(file_get_contents($value['tmp_name']));
  }
}