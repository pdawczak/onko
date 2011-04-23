<?php

class myValidatorFileContentExtractor extends sfValidatorBase
{
  protected function doClean($value)
  {
    return file_get_contents($value['tmp_name']);
  }
}
