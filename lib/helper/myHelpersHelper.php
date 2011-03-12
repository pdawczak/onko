<?php

function myGetPartial($partial, $values)
{
  return str_replace("\n", '', get_partial($partial, $values));
}