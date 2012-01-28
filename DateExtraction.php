<?php

require_once "QueryEncoder.php"
require_once "MyOut.php"

class DateExtraction
{
  public $aTest;
  public $aNumbers;
  public $myOut;
  public $debug = false;

  function __construct($debug = false)
  {
    $this->debug = $debug;
    $this->init();
  }

  function set_debug($debug)
  {
    $this->debug = $debug;
    $this->myOut->debug = $debug;
  }

  function init()
  {
    $this->myOut = new MyOut($this->debug);

    $this->aMatches = array(
        "lNFYN" => array("l", "d", "F", "Y", "H"),
        "lNFYNN" => array("l", "d", "F", "Y", "H", "i"),
        "lNFYNNN" => array("l", "d", "F", "Y", "H", "i"),
        "lNFYNNNN" => array("l", "d", "F", "Y", "H", "i"),
        "lNFY" => array("l", "d", "F", "Y"),
        "lNF" => array("l", "d", "F"),
        "NFYNN" => array("d", "F", "Y", "H", "i"),
        "NFNN" => array("d", "F", "H", "i"),
        "NNNNN" => array("d", "m", "y", "H", "i"),
        "NNNNNN" => array("d", "m", "y", "H", "i"),
        "NNNNNNN" => array("d", "m", "y", "H", "i"),
        "lNN" => array("l", "d", "m"),
        "lNFNN" => array("l", "d", "F", "H", "i"),
        "lNFNNNN" => array("l", "d", "F", "H", "i"),
        "lNFN" => array("l", "d", "F", "H"),
        "YNN" => array("Y", "m", "d"),
        "NNYNN" => array("d", "m", "Y", "H", "i"),
        "NNYNNN" => array("d", "m", "Y", "H", "i"),
        "NNYNNNN" => array("d", "m", "Y", "H", "i"),
        "NNYNNNNN" => array("d", "m", "Y", "H", "i"),
        "NNYNNNNNN" => array("d", "m", "Y", "H", "i"),
        "YNNNNN" => array("Y", "m", "d", "H", "i"),
        "F" => array("F"),
        "FF" => array("F"),
        "FFF" => array("F"),
        "FFFF" => array("F"),
        "NFN" => array("d", "F", "H")
    );

    $this->aTest = array(
        //English tests
        "Sunday 23 February 2011, 21:00h",
        "30 June 21:30h",
        "Next Friday",
        "21/07/2011 00:30h",
        "01/09/2011 00:00h",
        "18.07.2011 | 00.30 h - 05.00 h",
        "19.07.2011 | 00.30 h - 06.00 h",
        "22.07.2011 | 22.00 h - 00.30 h",
        //Spanish tests
        "SOUNDAYS MOTORCYCLE - 2011-07-17",
        "JUEVES",
        "VIERNES & SABADO",
        "Domingo 24 Junio 00:00h",
        "Dia: 19 de julio Hora: 22 h",
        "Viernes 22 Julio 2011 | 20:30",
        "Sábado 23 Julio 2011 | 01:00",
        "Lunes 11/07",
        "Viernes 08 Julio Apertura de puertas: 20:00",
        "Sabado 30 Julio Apertura de puertas: 19:00",
        "Fecha: 27/11/2011 Hora: Puertas 19:30h, Artista invitado: 19:45h, Show 20:30h",
        "HOY Sábado 05 Noviembre 2011 | 21:30 | 15€ ant. - 18€ Taq.",
        //Catalan tests
        "Dimecres, 14 desembre de 2011 21h",
        "DIUMENGE 17 DE JULIOL 2011 A LES 00:30 h.",
        "DISSABTE 23 DE JULIOL 2011 A LES 20:00 h.",
        "Dj  11/11/11  21:00",
        "Dc  20/10/11  21:30",
        "Ds  02/10/11  21:00",
        "Els Dimecres a Barcelona tenen una cita ineludible: Sala.",
        "Dimarts 19 de Juliol 21:00h | 23:00h",
        "Dissabte 23 de Juliol 22:00h",
        "Diumenge 17 de Juliol 0:00h",
        "Dia: 21 de juliol Hora:18 h",
        "
                                        Dissabte, 11 febrer 2012
                                        Horari pendent de confirmar                             "
    );

    $this->aNumbers = array(
        "0" => true,
        "1" => true,
        "2" => true,
        "3" => true,
        "4" => true,
        "5" => true,
        "6" => true,
        "7" => true,
        "8" => true,
        "9" => true
    );

    //TODO: Add more languages in aWeekDays and aYearMonths: French, German, Italian, Portuguese, etc...
    $this->aWeekDays = array(
        "en" => array(
            "monday" => "monday", "tuesday" => "tuesday",
            "wednesday" => "wednesday", "thursday" => "thursday",
            "friday" => "friday", "saturday" => "saturday",
            "sunday" => "sunday"
        ),
        "es" => array(
            "lunes" => "monday", "martes" => "tuesday",
            "miércoles" => "wednesday", "miercoles" => "wednesday",
            "jueves" => "thursday", "viernes" => "friday",
            "sábado" => "saturday", "sabado" => "saturday",
            "domingo" => "sunday"
        ),
        "ca" => array(
            "dilluns" => "monday", "dimarts" => "tuesday",
            "dimecres" => "wednesday", "dijous" => "thursday",
            "divendres" => "friday", "dissabte" => "saturday",
            "diumenge" => "sunday"
        )
    );

    $this->aYearMonths = array(
        "en" => array(
            "january" => "january", "february" => "february",
            "march" => "march", "april" => "april",
            "may" => "may", "june" => "june",
            "july" => "july", "august" => "august",
            "september" => "september", "october" => "october",
            "november" => "november", "december" => "december"),
        "es" => array(
            "enero" => "january", "febrero" => "february",
            "marzo" => "march", "abril" => "april",
            "mayo" => "may", "junio" => "june",
            "julio" => "july", "agosto" => "august",
            "septiembre" => "september", "octubre" => "october",
            "noviembre" => "november", "diciembre" => "december",
            "ene" => "january", "feb" => "february", "mar" => "march",
            "abr" => "april", "jun" => "june", "jul" => "july",
            "ago" => "august", "sep" => "september", "oct" => "october",
            "nov" => "november", "dic" => "december"),
        "ca" => array(
            "gener" => "january", "febrer" => "february",
            "març" => "march", "abril" => "april",
            "maig" => "may", "juny" => "june",
            "juliol" => "july", "agost" => "august",
            "setembre" => "september", "octubre" => "october",
            "novembre" => "november", "desembre" => "december")
    );

    $this->aNumMonths = array(
        "january" => 1,
        "february" => 2,
        "march" => 3,
        "april" => 4,
        "may" => 5,
        "june" => 6,
        "july" => 7,
        "august" => 8,
        "september" => 9,
        "october" => 10,
        "november" => 11,
        "december" => 12
    );
  }

  function isN($word)
  {
    $this->myOut->debug("word:$word");
    for($i = 0; $i < strlen($word); $i++){
      $c = $word[$i];
      $this->myOut->debug("c:$c => isset(aNumbers[$c])? => '" . isset($this->aNumbers[$c]) . "'");
      if(!isset($this->aNumbers[$c])){
        $this->myOut->debug("false!");
        if($i == (strlen($word) - 1) && strlen($word) > 1 && ($c === "h" || $c === "H")){
          return array(true, strlen($word), str_replace(array("h", "H"), "", $word));
        }
        return array(false, strlen($word), $word);
      }
    }

    $this->myOut->debug("true!");
    return array(true, strlen($word), $word);
  }

  function categorizeP($word)
  {
    foreach($this->aWeekDays as $language => $aDays){
      if(isset($aDays[$word])){
        return array($aDays[$word], "l");
      }
    }

    foreach($this->aYearMonths as $language => $aMonths){
      if(isset($aMonths[$word])){
        return array($aMonths[$word], "F");
      }
    }

    return array($word, false);
  }

  function parse_date($text)
  {
    $text = str_replace(array("\t", "\n", "\r"), " ", $text);
    $text_fixed = str_replace(array("&aacute;", "&eacute;"), array("á", "é"), $text);
    $aWords = explode(" ", QueryEncoder::clean_strange_chars($text_fixed));

    $aStates = array();
    $aCode = "";
    foreach($aWords as $word){

      list($isN, $length, $word_fixed) = $this->isN($word);
      $this->myOut->debug("isN($word)? => ('$isN',$length,'$word_fixed')");

      if(!$isN){

        list($word_e, $typeP) = $this->categorizeP($word);
        $this->myOut->debug("categorizeP($word)? => ('$word_e','$typeP')");

        if($typeP !== FALSE){
          $aStates[] = array("word" => $word_e, "state" => $typeP);
          $aCode .= $typeP;
        }
      }
      else{
        $s = ($isN && $length == 4) ? "Y" : "N";
        $aStates[] = array("word" => $word_fixed, "state" => $s);
        $aCode .= $s;
      }
    }

    $this->myOut->debug("aStates(in):" . print_r($aStates, true));
    $this->myOut->debug("aCode:$aCode");

    if(isset($this->aMatches[$aCode])){

      $aMatch = $this->aMatches[$aCode];
      $this->myOut->debug("aMatch($aCode):" . print_r($aMatch, true));

      foreach($aMatch as $i => $s){
        if(isset($aStates[$i])){
          $aStates[$i]['state'] = $s;
        }
      }
    }

    $this->myOut->debug("aStates(out):" . print_r($aStates, true));

    $ts = $this->get_time($aStates);

    $date_out = date('Y-m-d H:i:s', $ts);
    $this->myOut->info("<DateExtraction/parse_date('$text') = '$date_out'");

    return $date_out;
  }

  function get_time($aWords)
  {
    $data = array();
    $data['day_of_week'] = 0;
    foreach($aWords as $i => $info){
      if($info['state'] === "Y"){
        $data['year'] = $info['word'];
      }
      else if($info['state'] === "y"){
        $data['year'] = "20" . $info['word'];
      }
      else if($info['state'] === "d"){
        $data['day'] = $info['word'];
      }
      else if($info['state'] === "l"){
        if($data['day_of_week'] == 0){
          $data['day_of_week'] = strtotime("next " . $info['word']);
        }
      }
      else if($info['state'] === "H"){
        $data['hour'] = $info['word'];
      }
      else if($info['state'] === "i"){
        $data['minute'] = $info['word'];
      }
      else if($info['state'] === "F"){
        $data['month'] = $this->aNumMonths[$info['word']];
      }
      else if($info['state'] === "m"){
        $data['month'] = $info['word'];
      }
    }

    if(isset($data['day']) && isset($data['month']) && isset($data['year']) && isset($data['hour']) && isset($data['minute'])){
      return mktime($data['hour'], $data['minute'], 0, $data['month'], $data['day'], $data['year']);
    }
    if(isset($data['day']) && isset($data['month']) && isset($data['year']) && isset($data['hour'])){
      return mktime($data['hour'], 0, 0, $data['month'], $data['day'], $data['year']);
    }
    else if(isset($data['day']) && isset($data['month']) && isset($data['hour']) && isset($data['minute'])){
      return mktime($data['hour'], $data['minute'], 0, $data['month'], $data['day'], $this->predict_year($data['month']));
    }
    else if(isset($data['day']) && isset($data['month']) && isset($data['hour'])){
      return mktime($data['hour'], 0, 0, $data['month'], $data['day'], $this->predict_year($data['month']));
    }
    else if(isset($data['day']) && isset($data['month'])){
      //default time if not defined: 00:00
      return mktime(0, 0, 0, $data['month'], $data['day'], $this->predict_year($data['month']));
    }
    else if($data['day_of_week'] != 0){
      return $data['day_of_week'];
    }

    return false;
  }

  function predict_year($month)
  {
    $Y = date('Y');
    $m = date('m');

    if($m >= 9){ //Starting September we can accept dates from next year (only 6 months time)
      if($m == 9 && $month <= 3){
        return date('Y') + 1;
      }
      else if($m == 10 && $month <= 4){
        return date('Y') + 1;
      }
      else if($m == 11 && $month <= 5){
        return date('Y') + 1;
      }
      else if($m == 12 && $month <= 6){
        return date('Y') + 1;
      }
    }

    return date('Y');
  }

  function test()
  {
    foreach($this->aTest as $test){
      $then = microtime();
      $date = $this->parse_date($test);
      $now = microtime();
      //echo "$test\n => '" . $date . "' time:" . ($now - $then) . "\n";
    }
  }
}

//MANUAL TESTS  --uncomment to test
//TODO: Use an array with expected results to assert all the outputs for this test
 /*ini_set("memory_limit","128M");
  $de = new DateExtraction();
  //$de->set_debug(true);
  $de->test(); */
?>