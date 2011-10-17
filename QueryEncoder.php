<?php

require_once "Utf8Utils.class.php";

class QueryEncoder
{
    static function encrypt($str)
    {
        $aStr = explode(" ", $str);
        sort($aStr, SORT_STRING);

        $to_encode = "";
        foreach ($aStr as $word) {
            $to_encode .= $word . " ";
        }

        unset($aStr);
        //echo "<MD5Utils/encrypt> '".trim($to_encode)."' = '".md5(trim($to_encode))."'\n";
        return md5(trim($to_encode));
    }

    static public function encode($query)
    {
        $squery = QueryEncoder::clean_query($query);
        return QueryEncoder::encrypt( QueryEncoder::rmvacc($squery) );
    }
    
    static public function encode_and_clean($query)
    {
        $squery = QueryEncoder::clean_query($query);
        return array(QueryEncoder::encrypt( QueryEncoder::rmvacc($squery) ),$squery);
    }
    
    static public function clean_query($query)
    {
        $query = html_entity_decode($query);
        $query = QueryEncoder::arregla_caracteres_raros($query);
        return QueryEncoder::rmvacc(mb_strtolower($query,'utf-8'));
    }
    
    static function rmvacc($string)
    {
        return Utf8Utils::utf8_deaccent(Utf8Utils::utf8_deaccent($string, 0), 1);
    }
    
    function correct_encoding($str){
        if(!isset($str) || $str === ""){
            return "";
        }
        return $str;
    }

    public static function arregla_caracteres_raros($str)
    {
        $input_str = $str;
        //quitamos caracteres especiales (el punto no lo quitamos porque ya se elimina con la regular si creemos que no es necesario indexarlo)
        //$str = str_replace("[{}¡!\"#$%'()*+,-/:;¨<=>¿?@^_´`Ž{|}~\\[\\]\\\\]", " ", $str);
        $str = str_replace(array("&amp;","¡", "!", "\\", "/", "\"", "#", "$", "%", "'", "(", ")", "*", "+", ",", "-", "/", ":", ";",
                                 ",", "<", "=", ">", "¿", "?", "@", "^", "_", "´", "`", "Ž", "{", "|", "}", "~", "[", "]",
                                 "¨", "&", ".", /* %C2%A0 special space -> */" "), /* %20 standard space -> */ " ", $str);

        //pasamos a minusculas
        $str = mb_strtolower($str, 'UTF-8');
        //quitamos espacios multiples
        //$str = preg_replace("/( ){2,}/", " ", $str);
        $str = QueryEncoder::collapse_spaces($str);
        $str = trim($str);

        //echo "input_str:'$input_str', non_sc_str:'$non_sc_str'\n";
        return $str;
    }

    public static function collapse_spaces($argStr)
    {
      if($argStr == ""){
        return "";
      }

      $last = $argStr[0];
      $argBuf = "";

      for ($cIdx = 0 ; $cIdx < strlen($argStr); $cIdx++)
      {
          $ch = $argStr[$cIdx];
          //echo "ch:$ch => ";
          if (($ch !== " " && $ch !== "\r" && $ch !== "\n" && $ch !== "\t") || ($last !== " " && $last !== "\r" && $last !== "\n" && $last !== "\t"))
          {
              $argBuf .= $ch;
              $last = $ch;
              //echo "c1\n";
          }
          else{
            $last = " ";
            //echo "c2\n";
          }
      }

      return $argBuf;
    }

    function removeWords($str, &$aWords)
    {
        //list($sec,$mem) = MyTime::my_microtime();
        $accent_str = $str;
        $str = " " . $str . " ";
        $str = $this->rmvacc($str);

        foreach ($aWords as $co) {
            $str = str_replace($co, " ", $str);
        }

        $str_out = $this->reaccent($accent_str, $str);
        return array($str_out, $this->word_diff($accent_str, $str_out));
    }

    function hasWords($str, &$aWords)
    {
        //list($sec,$mem) = MyTime::my_microtime();
        $str_copy = $str;
        list($str, $word_diff) = $this->removeWords($str, $aWords);

        if (strlen($str_copy) == strlen($str)) {
            unset($str_copy);
            //list($sec,$mem) = MyTime::difference(array($sec,$mem));
            //$this->myecho->message_debug( "<SimilaresUpdater/hasWords()> Function consumed in " . $sec . " seconds, consumed " . $mem . " bytes." );
            return array(false, $word_diff);
        } else {
            unset($str_copy);
            //list($sec,$mem) = MyTime::difference(array($sec,$mem));
            //$this->myecho->message_debug( "<SimilaresUpdater/hasWords()> Function consumed in " . $sec . " seconds, consumed " . $mem . " bytes." );
            return array(true, $word_diff);
        }
    }

    function reaccent($phrase, $deaccent_phrase)
    {
        //list($sec,$mem) = MyTime::my_microtime();
        //echo "DEACCENT PHRASE: '$phrase', ACCENT PHRASE: '$deaccent_phrase'\n";
        $p = explode(" ", trim($phrase));
        $dp = explode(" ", trim($deaccent_phrase));
        $out = "";
        $k = 0;
        //print_r($p);print_r($dp);
        for ($i = 0; $i < count($dp); $i++) {
            for ($j = $k; $j < count($p); $j++) {
                //comparamos la palabra sin acentos con el deaccent de la palabra con acentos
                if ($dp[$i] == $this->rmvacc($p[$j])) {
                    //echo "in condition because dp at $i = '".$dp[$i]."' is equals to deaccent of p at $j ='".SimilaresWordsProcessor::rmvacc($p[$j])."'\n";
                    $out .= $p[$j] . " ";
                    $k = $j + 1;
                    break;
                }
            }
        }

        unset($i);
        unset($j);
        unset($k);
        unset($p);
        unset($dp);

        //list($sec,$mem) = MyTime::difference(array($sec,$mem));
        //$this->myecho->message_debug( "<SimilaresUpdater/reaccent()> Function consumed in " . $sec . " seconds, consumed " . $mem . " bytes." );
        //echo "OUT-PHRASE WITH ACCENTS: '".trim($out)."'";
        return trim($out);
    }

    function word_diff($standard_word, $changed_word)
    {
        $aChanged = explode(" ", $changed_word);
        $aStandard = explode(" ", $standard_word);
        $aDiff = array_diff($aStandard, $aChanged);
        if (count($aDiff) > 0) {
            //echo "aFixed:\n"; print_r($aFixed);
            //echo "aStandard:\n"; print_r($aStandard);
            //echo "aDiff:\n"; print_r($aDiff);
            return implode(",", $aDiff);
        } else {
            return "";
        }
    }
}
?>