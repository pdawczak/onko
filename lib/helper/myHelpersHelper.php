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

function myBooleanImage($val)
{
  $image_path = 'icons/';
  $image_path .= $val ? 'bullet_tick.png' : 'bullet_cross.png';
  return image_tag($image_path);
}
