<?php

class myChoordFileParserValidator extends sfValidatorBase
{
  protected function doClean($value)
  {
    $wz   = new WidmoWzgorze();
    $isp  = new WidmoIstotaSzaraPotyliczna();
    $isc  = new WidmoIstotaSzaraCzolowa();

    $data = Widmo::getRawArrayFromCoordFile(file_get_contents($value['tmp_name']));
    Widmo::processExtractingData($data, $wz, $isp, $isc);

    return array(
      'wz'  => $wz,
      'isp' => $isp,
      'isc' => $isc
    );
  }
}