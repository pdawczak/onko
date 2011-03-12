<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);
new sfDatabaseManager($configuration);

$t = new lime_test(24);

$wz   = new WidmoWzgorze();
$isp  = new WidmoIstotaSzaraPotyliczna();
$isc  = new WidmoIstotaSzaraCzolowa();


////////////////////////////////////////////////////////////////////////////////
//            WCZYTYWANIE DANYCH O WIDMACH
////////////////////////////////////////////////////////////////////////////////


$t->comment('1. Test of extracting data');
$content = <<<eof
Oto linijka, która i tak zostanie pominięta
20 ; 13 ; 10 ; 15 ; -5 ; 25 ; 4 ; -17 ; 3 ; -6 ; -10 ; 20
4 ; 14 ; -10 ; -6 ; 32 ; 14 ; -9 ; -1 ; 23 ; 14 ; -10 ; -8
-15 ; -8 ; 20 ; 30 ; -12 ; 8 ; 15 ; 10 ; -9 ; 14 ; -6 ; 8
eof
;

$test['wz']['skala_ppm']      = '20;4;-15';
$test['wz']['widmo']          = '13;14;-8';
$test['wz']['linia_bazowa']   = '15;-6;30';
$test['wz']['widmo_bazowa']   = '-2;20;-38';

$test['isp']['skala_ppm']     = '-5;32;-12';
$test['isp']['widmo']         = '25;14;8';
$test['isp']['linia_bazowa']  = '-17;-1;10';
$test['isp']['widmo_bazowa']  = '42;15;-2';

$test['isc']['skala_ppm']     = '3;23;-9';
$test['isc']['widmo']         = '-6;14;14';
$test['isc']['linia_bazowa']  = '20;-8;8';
$test['isc']['widmo_bazowa']   = '-26;22;6';

$data = Widmo::getRawArrayFromCoordFile($content);
Widmo::processExtractingData($data, $wz, $isp, $isc);

$t->comment("\t1.1. WidmoWzgorze");
$t->is($test['wz']['skala_ppm']     , $wz->getSkalaPpm(),     "\t\t-> skala_ppm");
$t->is($test['wz']['widmo']         , $wz->getWidmo(),        "\t\t-> widmo");
$t->is($test['wz']['linia_bazowa']  , $wz->getLiniaBazowa(),  "\t\t-> linia_bazowa");
$t->is($test['wz']['widmo_bazowa']  , $wz->getWidmoBazowa(),  "\t\t-> widmo_bazowa");

$t->comment("\t1.2. WidmoIstotaSzaraPotyliczna");
$t->is($test['isp']['skala_ppm']    , $isp->getSkalaPpm(),    "\t\t-> skala_ppm");
$t->is($test['isp']['widmo']        , $isp->getWidmo(),       "\t\t-> widmo");
$t->is($test['isp']['linia_bazowa'] , $isp->getLiniaBazowa(), "\t\t-> linia_bazowa");
$t->is($test['isp']['widmo_bazowa'] , $isp->getWidmoBazowa(), "\t\t-> widmo_bazowa");

$t->comment("\t1.3. WidmoIstotaSzaraCzolowa");
$t->is($test['isc']['skala_ppm']    , $isc->getSkalaPpm(),    "\t\t-> skala_ppm");
$t->is($test['isc']['widmo']        , $isc->getWidmo(),       "\t-> widmo");
$t->is($test['isc']['linia_bazowa'] , $isc->getLiniaBazowa(), "\t-> linia_bazowa");
$t->is($test['isc']['widmo_bazowa'] , $isc->getWidmoBazowa(), "\t-> widmo_bazowa");


////////////////////////////////////////////////////////////////////////////////
//            WCZYTYWANIE PARAMETRÓW AKWIZYCJI
////////////////////////////////////////////////////////////////////////////////


$t->comment('2. Test of extracting params');
$control = <<<eof
########################################
## BEGIN: /home/lukaszb/MP/1 wzgorze/
########################################
 LCMODL
 title= 'glowa-ZFM (2010.08.11 08:31:35) Sarlinska Agnieszka (1989.11.04) 5.8mL, TE/TR/NS=31/2000/128 (SV_wzgorze_TE 31)'
 srcraw= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_wzgorze_TE_31_9_1_raw_act.SDAT'
 srch2o= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_wzgorze_TE_31_9_1_raw_ref.SDAT'
 sddegz= 3.
 sddegp= 1.
 savdir= '/home/mary/wyniki/single/1/'
 ppmst= 4.0
 ppmend= 0.2
 nunfil= 1024
 ltable= 7
 lps= 8
 lprint= 6
 lcsv= 11
 lcoraw= 10
 lcoord= 9
 hzpppm= 1.2780e+02
 filtab= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/table'
 filraw= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/met/RAW'
 filps= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/ps'
 filpri= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/print'
 filh2o= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/h2o/RAW'
 filcsv= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/spreadsheet.csv'
 filcor= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/coraw'
 filcoo= '/home/mary/.lcmodel/temp/22d-10h-07m-28s-1957pid/coord'
 filbas= '/home/mary/.lcmodel/basis-sets/3T/philips-press_te30_3t_01a.basis'
 echot= 31.00
 dows= T
 deltat= 5.000e-04
 END
########################################
## END: /home/lukaszb/MP/1 wzgorze/
########################################

########################################
## BEGIN: /home/lukaszb/MP/2 szara pot/
########################################
 LCMODL
 title= 'glowa-ZFM (2010.08.11 08:31:35) Sarlinska Agnieszka (1989.11.04) 8.0mL, TE/TR/NS=31/2000/64 (SV_szara pot_TE 31)'
 srcraw= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_szara_pot_TE_31_15_1_raw_act.SDAT'
 srch2o= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_szara_pot_TE_31_15_1_raw_ref.SDAT'
 sddegz= 3.
 sddegp= 1.
 savdir= '/home/mary/wyniki/single/2/'
 ppmst= 4.0
 ppmend= 0.2
 nunfil= 1024
 ltable= 7
 lps= 8
 lprint= 6
 lcsv= 11
 lcoraw= 10
 lcoord= 9
 hzpppm= 1.2780e+02
 filtab= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/table'
 filraw= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/met/RAW'
 filps= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/ps'
 filpri= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/print'
 filh2o= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/h2o/RAW'
 filcsv= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/spreadsheet.csv'
 filcor= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/coraw'
 filcoo= '/home/mary/.lcmodel/temp/22d-10h-07m-51s-1957pid/coord'
 filbas= '/home/mary/.lcmodel/basis-sets/3T/philips-press_te30_3t_01a.basis'
 echot= 31.00
 dows= T
 deltat= 5.000e-04
 END
########################################
## END: /home/lukaszb/MP/2 szara pot/
########################################

########################################
## BEGIN: /home/lukaszb/MP/3 szara cz/
########################################
 LCMODL
 title= 'glowa-ZFM (2010.08.11 08:31:35) Sarlinska Agnieszka (1989.11.04) 8.0mL, TE/TR/NS=29/2000/64 (SV_szara cz_TE 31)'
 srcraw= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_szara_cz_TE_31_14_1_raw_act.SDAT'
 srch2o= '/home/mary/widma_aga/11-08-2010/Sarliska_Agnieszka/Sarlinska_Agnieszka_SV_szara_cz_TE_31_14_1_raw_ref.SDAT'
 sddegz= 3.
 sddegp= 1.
 savdir= '/home/mary/wyniki/single/3/'
 ppmst= 4.0
 ppmend= 0.2
 nunfil= 1024
 ltable= 7
 lps= 8
 lprint= 6
 lcsv= 11
 lcoraw= 10
 lcoord= 9
 hzpppm= 1.2780e+02
 filtab= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/table'
 filraw= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/met/RAW'
 filps= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/ps'
 filpri= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/print'
 filh2o= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/h2o/RAW'
 filcsv= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/spreadsheet.csv'
 filcor= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/coraw'
 filcoo= '/home/mary/.lcmodel/temp/22d-10h-08m-16s-1957pid/coord'
 filbas= '/home/mary/.lcmodel/basis-sets/3T/philips-press_te30_3t_01a.basis'
 echot= 29.00
 dows= T
 deltat= 5.000e-04
 END
########################################
## END: /home/lukaszb/MP/3 szara cz/
########################################
eof
;
$params = Widmo::parseParams($control);
Widmo::setParams($params, $wz, $isp, $isc);

$t->comment("\t2.1. WidmoWzgorze");
$t->is(31,    $wz->getTe(),  "\t-> TE");
$t->is(2000,  $wz->getTr(),  "\t-> TR");
$t->is(128,   $wz->getNs(),  "\t-> NS");

$t->comment("\t2.2. WidmoIstotaSzaraPotyliczna");
$t->is(31,    $isp->getTe(),  "\t-> TE");
$t->is(2000,  $isp->getTr(),  "\t-> TR");
$t->is(64,    $isp->getNs(),  "\t-> NS");

$t->comment("\t2.3. WidmoIstotaSzaraCzolowa");
$t->is(29,    $isc->getTe(),  "\t-> TE");
$t->is(2000,  $isc->getTr(),  "\t-> TR");
$t->is(64,    $isc->getNs(),  "\t-> NS");


////////////////////////////////////////////////////////////////////////////////
//            WCZYTYWANIE PARAMETRÓW AKWIZYCJI
////////////////////////////////////////////////////////////////////////////////


$t->comment('3. Test of extracting concentrations');
$spreadsheed = <<<eof
Jakieś tam nagłówki, które i tak znikną...
to tam taki nagłówek 1; 1; 2; 6; 7
a to inny nagłówek; 1; 2; 6; 2
No i ostatni nagłówek; 7; 9; 0; 8
eof
;

$concetrations = Widmo::parseSpreadsheet($spreadsheed);
Widmo::setConcetrations($concetrations, $wz, $isp, $isc);

$t->comment("\t3.1. WidmoWzgorze");
$t->is('1;2;6;7', $wz->getStezenia());

$t->comment("\t3.2. WidmoIstotaSzaraPotyliczna");
$t->is('1;2;6;2',  $isp->getStezenia());

$t->comment("\t3.3. WidmoIstotaSzaraCzolowa");
$t->is('7;9;0;8',  $isc->getStezenia());