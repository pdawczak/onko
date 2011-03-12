<?php

class myControlFileParserValidator extends sfValidatorBase
{
  protected function doClean($value)
  {
    return Widmo::parseParams(file_get_contents($value['tmp_name']));
  }
}