<?php

function myGetPartial($partial, $values)
{
  return str_replace("\n", '', get_partial($partial, $values));
}

function myFormatDate($date)
{
  $time = strtotime($date);
  return date('d.m.Y', $time);
}

function myBooleanWord($val)
{
  return $val ? 'Tak' : 'Nie';
}
