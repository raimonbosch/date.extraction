<?php

class QueryEncoder
{
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
}
?>