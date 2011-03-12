<?php

class myWidgetFormDate extends sfWidgetFormDate
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $years = range(date('Y'), 1960);

    $this->setOption('format', '%day%-%month%-%year%');
    $this->setOption('years', array_combine($years, $years));
  }
}