<?php

    class Utf8Utils {
        
  static private $UTF8_UPPER_TO_LOWER = array (
    "ï¼º"=>"ï½š","ï¼¹"=>"ï½™","ï¼¸"=>"ï½˜","ï¼·"=>"ï½—","ï¼¶"=>"ï½–","ï¼µ"=>"ï½•","ï¼´"=>"ï½”","ï¼³"=>"ï½“","ï¼²"=>"ï½’","ï¼±"=>"ï½‘",
    "ï¼°"=>"ï½","ï¼¯"=>"ï½","ï¼®"=>"ï½Ž","ï¼­"=>"ï½","ï¼¬"=>"ï½Œ","ï¼«"=>"ï½‹","ï¼ª"=>"ï½Š","ï¼©"=>"ï½‰","ï¼¨"=>"ï½ˆ","ï¼§"=>"ï½‡",
    "ï¼¦"=>"ï½†","ï¼¥"=>"ï½…","ï¼¤"=>"ï½„","ï¼£"=>"ï½ƒ","ï¼¢"=>"ï½‚","ï¼¡"=>"ï½","á¿¼"=>"á¿³","á¿¬"=>"á¿¥","á¿©"=>"á¿¡","á¿™"=>"á¿‘",
    "á¿˜"=>"á¿","á¿Œ"=>"á¿ƒ","Î™"=>"á¾¾","á¾¼"=>"á¾³","á¾¹"=>"á¾±","á¾¸"=>"á¾°","á¾¯"=>"á¾§","á¾®"=>"á¾¦","á¾­"=>"á¾¥","á¾¬"=>"á¾¤",
    "á¾«"=>"á¾£","á¾ª"=>"á¾¢","á¾©"=>"á¾¡","á¾Ÿ"=>"á¾—","á¾ž"=>"á¾–","á¾"=>"á¾•","á¾œ"=>"á¾”","á¾›"=>"á¾“","á¾š"=>"á¾’","á¾™"=>"á¾‘",
    "á¾˜"=>"á¾","á¾"=>"á¾‡","á¾Ž"=>"á¾†","á¾"=>"á¾…","á¾Œ"=>"á¾„","á¾‹"=>"á¾ƒ","á¾Š"=>"á¾‚","á¾‰"=>"á¾","á¾ˆ"=>"á¾€","á¿»"=>"á½½",
    "á¿º"=>"á½¼","á¿«"=>"á½»","á¿ª"=>"á½º","á¿¹"=>"á½¹","á¿¸"=>"á½¸","á¿›"=>"á½·","á¿š"=>"á½¶","á¿‹"=>"á½µ","á¿Š"=>"á½´","á¿‰"=>"á½³",
    "á¿ˆ"=>"á½²","á¾»"=>"á½±","á¾º"=>"á½°","á½¯"=>"á½§","á½®"=>"á½¦","á½­"=>"á½¥","á½¬"=>"á½¤","á½«"=>"á½£","á½ª"=>"á½¢","á½©"=>"á½¡",
    "á½Ÿ"=>"á½—","á½"=>"á½•","á½›"=>"á½“","á½™"=>"á½‘","á½"=>"á½…","á½Œ"=>"á½„","á½‹"=>"á½ƒ","á½Š"=>"á½‚","á½‰"=>"á½","á½ˆ"=>"á½€",
    "á¼¿"=>"á¼·","á¼¾"=>"á¼¶","á¼½"=>"á¼µ","á¼¼"=>"á¼´","á¼»"=>"á¼³","á¼º"=>"á¼²","á¼¹"=>"á¼±","á¼¸"=>"á¼°","á¼¯"=>"á¼§","á¼®"=>"á¼¦",
    "á¼­"=>"á¼¥","á¼¬"=>"á¼¤","á¼«"=>"á¼£","á¼ª"=>"á¼¢","á¼©"=>"á¼¡","á¼"=>"á¼•","á¼œ"=>"á¼”","á¼›"=>"á¼“","á¼š"=>"á¼’","á¼™"=>"á¼‘",
    "á¼˜"=>"á¼","á¼"=>"á¼‡","á¼Ž"=>"á¼†","á¼"=>"á¼…","á¼Œ"=>"á¼„","á¼‹"=>"á¼ƒ","á¼Š"=>"á¼‚","á¼‰"=>"á¼","á¼ˆ"=>"á¼€","á»¸"=>"á»¹",
    "á»¶"=>"á»·","á»´"=>"á»µ","á»²"=>"á»³","á»°"=>"á»±","á»®"=>"á»¯","á»¬"=>"á»­","á»ª"=>"á»«","á»¨"=>"á»©","á»¦"=>"á»§","á»¤"=>"á»¥",
    "á»¢"=>"á»£","á» "=>"á»¡","á»ž"=>"á»Ÿ","á»œ"=>"á»","á»š"=>"á»›","á»˜"=>"á»™","á»–"=>"á»—","á»”"=>"á»•","á»’"=>"á»“","á»"=>"á»‘",
    "á»Ž"=>"á»","á»Œ"=>"á»","á»Š"=>"á»‹","á»ˆ"=>"á»‰","á»†"=>"á»‡","á»„"=>"á»…","á»‚"=>"á»ƒ","á»€"=>"á»","áº¾"=>"áº¿","áº¼"=>"áº½",
    "áºº"=>"áº»","áº¸"=>"áº¹","áº¶"=>"áº·","áº´"=>"áºµ","áº²"=>"áº³","áº°"=>"áº±","áº®"=>"áº¯","áº¬"=>"áº­","áºª"=>"áº«","áº¨"=>"áº©",
    "áº¦"=>"áº§","áº¤"=>"áº¥","áº¢"=>"áº£","áº "=>"áº¡","á¹ "=>"áº›","áº”"=>"áº•","áº’"=>"áº“","áº"=>"áº‘","áºŽ"=>"áº","áºŒ"=>"áº",
    "áºŠ"=>"áº‹","áºˆ"=>"áº‰","áº†"=>"áº‡","áº„"=>"áº…","áº‚"=>"áºƒ","áº€"=>"áº","á¹¾"=>"á¹¿","á¹¼"=>"á¹½","á¹º"=>"á¹»","á¹¸"=>"á¹¹",
    "á¹¶"=>"á¹·","á¹´"=>"á¹µ","á¹²"=>"á¹³","á¹°"=>"á¹±","á¹®"=>"á¹¯","á¹¬"=>"á¹­","á¹ª"=>"á¹«","á¹¨"=>"á¹©","á¹¦"=>"á¹§","á¹¤"=>"á¹¥",
    "á¹¢"=>"á¹£","á¹ "=>"á¹¡","á¹ž"=>"á¹Ÿ","á¹œ"=>"á¹","á¹š"=>"á¹›","á¹˜"=>"á¹™","á¹–"=>"á¹—","á¹”"=>"á¹•","á¹’"=>"á¹“","á¹"=>"á¹‘",
    "á¹Ž"=>"á¹","á¹Œ"=>"á¹","á¹Š"=>"á¹‹","á¹ˆ"=>"á¹‰","á¹†"=>"á¹‡","á¹„"=>"á¹…","á¹‚"=>"á¹ƒ","á¹€"=>"á¹","á¸¾"=>"á¸¿","á¸¼"=>"á¸½",
    "á¸º"=>"á¸»","á¸¸"=>"á¸¹","á¸¶"=>"á¸·","á¸´"=>"á¸µ","á¸²"=>"á¸³","á¸°"=>"á¸±","á¸®"=>"á¸¯","á¸¬"=>"á¸­","á¸ª"=>"á¸«","á¸¨"=>"á¸©",
    "á¸¦"=>"á¸§","á¸¤"=>"á¸¥","á¸¢"=>"á¸£","á¸ "=>"á¸¡","á¸ž"=>"á¸Ÿ","á¸œ"=>"á¸","á¸š"=>"á¸›","á¸˜"=>"á¸™","á¸–"=>"á¸—","á¸”"=>"á¸•",
    "á¸’"=>"á¸“","á¸"=>"á¸‘","á¸Ž"=>"á¸","á¸Œ"=>"á¸","á¸Š"=>"á¸‹","á¸ˆ"=>"á¸‰","á¸†"=>"á¸‡","á¸„"=>"á¸…","á¸‚"=>"á¸ƒ","á¸€"=>"á¸",
    "Õ–"=>"Ö†","Õ•"=>"Ö…","Õ”"=>"Ö„","Õ“"=>"Öƒ","Õ’"=>"Ö‚","Õ‘"=>"Ö","Õ"=>"Ö€","Õ"=>"Õ¿","ÕŽ"=>"Õ¾","Õ"=>"Õ½",
    "ÕŒ"=>"Õ¼","Õ‹"=>"Õ»","ÕŠ"=>"Õº","Õ‰"=>"Õ¹","Õˆ"=>"Õ¸","Õ‡"=>"Õ·","Õ†"=>"Õ¶","Õ…"=>"Õµ","Õ„"=>"Õ´","Õƒ"=>"Õ³",
    "Õ‚"=>"Õ²","Õ"=>"Õ±","Õ€"=>"Õ°","Ô¿"=>"Õ¯","Ô¾"=>"Õ®","Ô½"=>"Õ­","Ô¼"=>"Õ¬","Ô»"=>"Õ«","Ôº"=>"Õª","Ô¹"=>"Õ©",
    "Ô¸"=>"Õ¨","Ô·"=>"Õ§","Ô¶"=>"Õ¦","Ôµ"=>"Õ¥","Ô´"=>"Õ¤","Ô³"=>"Õ£","Ô²"=>"Õ¢","Ô±"=>"Õ¡","ÔŽ"=>"Ô","ÔŒ"=>"Ô",
    "ÔŠ"=>"Ô‹","Ôˆ"=>"Ô‰","Ô†"=>"Ô‡","Ô„"=>"Ô…","Ô‚"=>"Ôƒ","Ô€"=>"Ô","Ó¸"=>"Ó¹","Ó´"=>"Óµ","Ó²"=>"Ó³","Ó°"=>"Ó±",
    "Ó®"=>"Ó¯","Ó¬"=>"Ó­","Óª"=>"Ó«","Ó¨"=>"Ó©","Ó¦"=>"Ó§","Ó¤"=>"Ó¥","Ó¢"=>"Ó£","Ó "=>"Ó¡","Óž"=>"ÓŸ","Óœ"=>"Ó",
    "Óš"=>"Ó›","Ó˜"=>"Ó™","Ó–"=>"Ó—","Ó”"=>"Ó•","Ó’"=>"Ó“","Ó"=>"Ó‘","Ó"=>"ÓŽ","Ó‹"=>"ÓŒ","Ó‰"=>"ÓŠ","Ó‡"=>"Óˆ",
    "Ó…"=>"Ó†","Óƒ"=>"Ó„","Ó"=>"Ó‚","Ò¾"=>"Ò¿","Ò¼"=>"Ò½","Òº"=>"Ò»","Ò¸"=>"Ò¹","Ò¶"=>"Ò·","Ò´"=>"Òµ","Ò²"=>"Ò³",
    "Ò°"=>"Ò±","Ò®"=>"Ò¯","Ò¬"=>"Ò­","Òª"=>"Ò«","Ò¨"=>"Ò©","Ò¦"=>"Ò§","Ò¤"=>"Ò¥","Ò¢"=>"Ò£","Ò "=>"Ò¡","Òž"=>"ÒŸ",
    "Òœ"=>"Ò","Òš"=>"Ò›","Ò˜"=>"Ò™","Ò–"=>"Ò—","Ò”"=>"Ò•","Ò’"=>"Ò“","Ò"=>"Ò‘","ÒŽ"=>"Ò","ÒŒ"=>"Ò","ÒŠ"=>"Ò‹",
    "Ò€"=>"Ò","Ñ¾"=>"Ñ¿","Ñ¼"=>"Ñ½","Ñº"=>"Ñ»","Ñ¸"=>"Ñ¹","Ñ¶"=>"Ñ·","Ñ´"=>"Ñµ","Ñ²"=>"Ñ³","Ñ°"=>"Ñ±","Ñ®"=>"Ñ¯",
    "Ñ¬"=>"Ñ­","Ñª"=>"Ñ«","Ñ¨"=>"Ñ©","Ñ¦"=>"Ñ§","Ñ¤"=>"Ñ¥","Ñ¢"=>"Ñ£","Ñ "=>"Ñ¡","Ð"=>"ÑŸ","ÐŽ"=>"Ñž","Ð"=>"Ñ",
    "ÐŒ"=>"Ñœ","Ð‹"=>"Ñ›","ÐŠ"=>"Ñš","Ð‰"=>"Ñ™","Ðˆ"=>"Ñ˜","Ð‡"=>"Ñ—","Ð†"=>"Ñ–","Ð…"=>"Ñ•","Ð„"=>"Ñ”","Ðƒ"=>"Ñ“",
    "Ð‚"=>"Ñ’","Ð"=>"Ñ‘","Ð€"=>"Ñ","Ð¯"=>"Ñ","Ð®"=>"ÑŽ","Ð­"=>"Ñ","Ð¬"=>"ÑŒ","Ð«"=>"Ñ‹","Ðª"=>"ÑŠ","Ð©"=>"Ñ‰",
    "Ð¨"=>"Ñˆ","Ð§"=>"Ñ‡","Ð¦"=>"Ñ†","Ð¥"=>"Ñ…","Ð¤"=>"Ñ„","Ð£"=>"Ñƒ","Ð¢"=>"Ñ‚","Ð¡"=>"Ñ","Ð "=>"Ñ€","ÐŸ"=>"Ð¿",
    "Ðž"=>"Ð¾","Ð"=>"Ð½","Ðœ"=>"Ð¼","Ð›"=>"Ð»","Ðš"=>"Ðº","Ð™"=>"Ð¹","Ð˜"=>"Ð¸","Ð—"=>"Ð·","Ð–"=>"Ð¶","Ð•"=>"Ðµ",
    "Ð”"=>"Ð´","Ð“"=>"Ð³","Ð’"=>"Ð²","Ð‘"=>"Ð±","Ð"=>"Ð°","Î•"=>"Ïµ","Î£"=>"Ï²","Î¡"=>"Ï±","Îš"=>"Ï°","Ï®"=>"Ï¯",
    "Ï¬"=>"Ï­","Ïª"=>"Ï«","Ï¨"=>"Ï©","Ï¦"=>"Ï§","Ï¤"=>"Ï¥","Ï¢"=>"Ï£","Ï "=>"Ï¡","Ïž"=>"ÏŸ","Ïœ"=>"Ï","Ïš"=>"Ï›",
    "Ï˜"=>"Ï™","Î "=>"Ï–","Î¦"=>"Ï•","Î˜"=>"Ï‘","Î’"=>"Ï","Î"=>"ÏŽ","ÎŽ"=>"Ï","ÎŒ"=>"ÏŒ","Î«"=>"Ï‹","Îª"=>"ÏŠ",
    "Î©"=>"Ï‰","Î¨"=>"Ïˆ","Î§"=>"Ï‡","Î¦"=>"Ï†","Î¥"=>"Ï…","Î¤"=>"Ï„","Î£"=>"Ïƒ","Î£"=>"Ï‚","Î¡"=>"Ï","Î "=>"Ï€",
    "ÎŸ"=>"Î¿","Îž"=>"Î¾","Î"=>"Î½","Îœ"=>"Î¼","Î›"=>"Î»","Îš"=>"Îº","Î™"=>"Î¹","Î˜"=>"Î¸","Î—"=>"Î·","Î–"=>"Î¶",
    "Î•"=>"Îµ","Î”"=>"Î´","Î“"=>"Î³","Î’"=>"Î²","Î‘"=>"Î±","ÎŠ"=>"Î¯","Î‰"=>"Î®","Îˆ"=>"Î­","Î†"=>"Î¬","Æ·"=>"Ê’",
    "Æ²"=>"Ê‹","Æ±"=>"ÊŠ","Æ®"=>"Êˆ","Æ©"=>"Êƒ","Æ¦"=>"Ê€","ÆŸ"=>"Éµ","Æ"=>"É²","Æœ"=>"É¯","Æ–"=>"É©","Æ—"=>"É¨",
    "Æ”"=>"É£","Æ"=>"É›","Æ"=>"É™","ÆŠ"=>"É—","Æ‰"=>"É–","Æ†"=>"É”","Æ"=>"É“","È²"=>"È³","È°"=>"È±","È®"=>"È¯",
    "È¬"=>"È­","Èª"=>"È«","È¨"=>"È©","È¦"=>"È§","È¤"=>"È¥","È¢"=>"È£","Èž"=>"ÈŸ","Èœ"=>"È","Èš"=>"È›","È˜"=>"È™",
    "È–"=>"È—","È”"=>"È•","È’"=>"È“","È"=>"È‘","ÈŽ"=>"È","ÈŒ"=>"È","ÈŠ"=>"È‹","Èˆ"=>"È‰","È†"=>"È‡","È„"=>"È…",
    "È‚"=>"Èƒ","È€"=>"È","Ç¾"=>"Ç¿","Ç¼"=>"Ç½","Çº"=>"Ç»","Ç¸"=>"Ç¹","Ç´"=>"Çµ","Ç²"=>"Ç³","Ç®"=>"Ç¯","Ç¬"=>"Ç­",
    "Çª"=>"Ç«","Ç¨"=>"Ç©","Ç¦"=>"Ç§","Ç¤"=>"Ç¥","Ç¢"=>"Ç£","Ç "=>"Ç¡","Çž"=>"ÇŸ","ÆŽ"=>"Ç","Ç›"=>"Çœ","Ç™"=>"Çš",
    "Ç—"=>"Ç˜","Ç•"=>"Ç–","Ç“"=>"Ç”","Ç‘"=>"Ç’","Ç"=>"Ç","Ç"=>"ÇŽ","Ç‹"=>"ÇŒ","Çˆ"=>"Ç‰","Ç…"=>"Ç†","Ç·"=>"Æ¿",
    "Æ¼"=>"Æ½","Æ¸"=>"Æ¹","Æµ"=>"Æ¶","Æ³"=>"Æ´","Æ¯"=>"Æ°","Æ¬"=>"Æ­","Æ§"=>"Æ¨","Æ¤"=>"Æ¥","Æ¢"=>"Æ£","Æ "=>"Æ¡",
    "È "=>"Æž","Æ˜"=>"Æ™","Ç¶"=>"Æ•","Æ‘"=>"Æ’","Æ‹"=>"ÆŒ","Æ‡"=>"Æˆ","Æ„"=>"Æ…","Æ‚"=>"Æƒ","S"=>"Å¿","Å½"=>"Å¾",
    "Å»"=>"Å¼","Å¹"=>"Åº","Å¶"=>"Å·","Å´"=>"Åµ","Å²"=>"Å³","Å°"=>"Å±","Å®"=>"Å¯","Å¬"=>"Å­","Åª"=>"Å«","Å¨"=>"Å©",
    "Å¦"=>"Å§","Å¤"=>"Å¥","Å¢"=>"Å£","Å "=>"Å¡","Åž"=>"ÅŸ","Åœ"=>"Å","Åš"=>"Å›","Å˜"=>"Å™","Å–"=>"Å—","Å”"=>"Å•",
    "Å’"=>"Å“","Å"=>"Å‘","ÅŽ"=>"Å","ÅŒ"=>"Å","ÅŠ"=>"Å‹","Å‡"=>"Åˆ","Å…"=>"Å†","Åƒ"=>"Å„","Å"=>"Å‚","Ä¿"=>"Å€",
    "Ä½"=>"Ä¾","Ä»"=>"Ä¼","Ä¹"=>"Äº","Ä¶"=>"Ä·","Ä´"=>"Äµ","Ä²"=>"Ä³","I"=>"Ä±","Ä®"=>"Ä¯","Ä¬"=>"Ä­","Äª"=>"Ä«",
    "Ä¨"=>"Ä©","Ä¦"=>"Ä§","Ä¤"=>"Ä¥","Ä¢"=>"Ä£","Ä "=>"Ä¡","Äž"=>"ÄŸ","Äœ"=>"Ä","Äš"=>"Ä›","Ä˜"=>"Ä™","Ä–"=>"Ä—",
    "Ä”"=>"Ä•","Ä’"=>"Ä“","Ä"=>"Ä‘","ÄŽ"=>"Ä","ÄŒ"=>"Ä","ÄŠ"=>"Ä‹","Äˆ"=>"Ä‰","Ä†"=>"Ä‡","Ä„"=>"Ä…","Ä‚"=>"Äƒ",
    "Ä€"=>"Ä","Å¸"=>"Ã¿","Ãž"=>"Ã¾","Ã"=>"Ã½","Ãœ"=>"Ã¼","Ã›"=>"Ã»","Ãš"=>"Ãº","Ã™"=>"Ã¹","Ã˜"=>"Ã¸","Ã–"=>"Ã¶",
    "Ã•"=>"Ãµ","Ã”"=>"Ã´","Ã“"=>"Ã³","Ã’"=>"Ã²","Ã‘"=>"Ã±","Ã"=>"Ã°","Ã"=>"Ã¯","ÃŽ"=>"Ã®","Ã"=>"Ã­","ÃŒ"=>"Ã¬",
    "Ã‹"=>"Ã«","ÃŠ"=>"Ãª","Ã‰"=>"Ã©","Ãˆ"=>"Ã¨","Ã‡"=>"Ã§","Ã†"=>"Ã¦","Ã…"=>"Ã¥","Ã„"=>"Ã¤","Ãƒ"=>"Ã£","Ã‚"=>"Ã¢",
    "Ã"=>"Ã¡","Ã€"=>"Ã ","Îœ"=>"Âµ","Z"=>"z","Y"=>"y","X"=>"x","W"=>"w","V"=>"v","U"=>"u","T"=>"t",
    "S"=>"s","R"=>"r","Q"=>"q","P"=>"p","O"=>"o","N"=>"n","M"=>"m","L"=>"l","K"=>"k","J"=>"j",
    "I"=>"i","H"=>"h","G"=>"g","F"=>"f","E"=>"e","D"=>"d","C"=>"c","B"=>"b","A"=>"a"
  );
   
        static private $UTF8_LOWER_ACCENTS = array(
          'à' => 'a', 'ô' => 'o', 'ď' => 'd', 'ḟ' => 'f', 'ë' => 'e', 'š' => 's', 'ơ' => 'o',
          'ß' => 'ss', 'ă' => 'a', 'ř' => 'r', 'ț' => 't', 'ň' => 'n', 'ā' => 'a', 'ķ' => 'k',
          'ŝ' => 's', 'ỳ' => 'y', 'ņ' => 'n', 'ĺ' => 'l', 'ħ' => 'h', 'ṗ' => 'p', 'ó' => 'o',
          'ú' => 'u', 'ě' => 'e', 'é' => 'e', 'ç' => 'c', 'ẁ' => 'w', 'ċ' => 'c', 'õ' => 'o',
          'ṡ' => 's', 'ø' => 'o', 'ģ' => 'g', 'ŧ' => 't', 'ș' => 's', 'ė' => 'e', 'ĉ' => 'c',
          'ś' => 's', 'î' => 'i', 'ű' => 'u', 'ć' => 'c', 'ę' => 'e', 'ŵ' => 'w', 'ṫ' => 't',
          'ū' => 'u', 'č' => 'c', 'ö' => 'oe', 'è' => 'e', 'ŷ' => 'y', 'ą' => 'a', 'ł' => 'l',
          'ų' => 'u', 'ů' => 'u', 'ş' => 's', 'ğ' => 'g', 'ļ' => 'l', 'ƒ' => 'f', 'ž' => 'z',
          'ẃ' => 'w', 'ḃ' => 'b', 'å' => 'a', 'ì' => 'i', 'ï' => 'i', 'ḋ' => 'd', 'ť' => 't',
          'ŗ' => 'r', 'ä' => 'ae', 'í' => 'i', 'ŕ' => 'r', 'ê' => 'e', 'ü' => 'ue', 'ò' => 'o',
          'ē' => 'e', 'ñ' => 'n', 'ń' => 'n', 'ĥ' => 'h', 'ĝ' => 'g', 'đ' => 'd', 'ĵ' => 'j',
          'ÿ' => 'y', 'ũ' => 'u', 'ŭ' => 'u', 'ư' => 'u', 'ţ' => 't', 'ý' => 'y', 'ő' => 'o',
          'â' => 'a', 'ľ' => 'l', 'ẅ' => 'w', 'ż' => 'z', 'ī' => 'i', 'ã' => 'a', 'ġ' => 'g',
          'ṁ' => 'm', 'ō' => 'o', 'ĩ' => 'i', 'ù' => 'u', 'į' => 'i', 'ź' => 'z', 'á' => 'a',
          'û' => 'u', 'þ' => 'th', 'ð' => 'dh', 'æ' => 'ae', 'µ' => 'u',
        );
       
        /**
         * UTF-8 lookup table for upper case accented letters
         *
         * This lookuptable defines replacements for accented characters from the ASCII-7
         * range. This are upper case letters only.
         *
         * @author Andreas Gohr <andi@splitbrain.org>
         * @see    utf8_deaccent()
         */
        static private $UTF8_UPPER_ACCENTS = array(
          'À' => 'A', 'Ô' => 'O', 'Ď' => 'D', 'Ḟ' => 'F', 'Ë' => 'E', 'Š' => 'S', 'Ơ' => 'O',
          'Ă' => 'A', 'Ř' => 'R', 'Ț' => 'T', 'Ň' => 'N', 'Ā' => 'A', 'Ķ' => 'K',
          'Ŝ' => 'S', 'Ỳ' => 'Y', 'Ņ' => 'N', 'Ĺ' => 'L', 'Ħ' => 'H', 'Ṗ' => 'P', 'Ó' => 'O',
          'Ú' => 'U', 'Ě' => 'E', 'É' => 'E', 'Ç' => 'C', 'Ẁ' => 'W', 'Ċ' => 'C', 'Õ' => 'O',
          'Ṡ' => 'S', 'Ø' => 'O', 'Ģ' => 'G', 'Ŧ' => 'T', 'Ș' => 'S', 'Ė' => 'E', 'Ĉ' => 'C',
          'Ś' => 'S', 'Î' => 'I', 'Ű' => 'U', 'Ć' => 'C', 'Ę' => 'E', 'Ŵ' => 'W', 'Ṫ' => 'T',
          'Ū' => 'U', 'Č' => 'C', 'Ö' => 'Oe', 'È' => 'E', 'Ŷ' => 'Y', 'Ą' => 'A', 'Ł' => 'L',
          'Ų' => 'U', 'Ů' => 'U', 'Ş' => 'S', 'Ğ' => 'G', 'Ļ' => 'L', 'Ƒ' => 'F', 'Ž' => 'Z',
          'Ẃ' => 'W', 'Ḃ' => 'B', 'Å' => 'A', 'Ì' => 'I', 'Ï' => 'I', 'Ḋ' => 'D', 'Ť' => 'T',
          'Ŗ' => 'R', 'Ä' => 'Ae', 'Í' => 'I', 'Ŕ' => 'R', 'Ê' => 'E', 'Ü' => 'Ue', 'Ò' => 'O',
          'Ē' => 'E', 'Ñ' => 'N', 'Ń' => 'N', 'Ĥ' => 'H', 'Ĝ' => 'G', 'Đ' => 'D', 'Ĵ' => 'J',
          'Ÿ' => 'Y', 'Ũ' => 'U', 'Ŭ' => 'U', 'Ư' => 'U', 'Ţ' => 'T', 'Ý' => 'Y', 'Ő' => 'O',
          'Â' => 'A', 'Ľ' => 'L', 'Ẅ' => 'W', 'Ż' => 'Z', 'Ī' => 'I', 'Ã' => 'A', 'Ġ' => 'G',
          'Ṁ' => 'M', 'Ō' => 'O', 'Ĩ' => 'I', 'Ù' => 'U', 'Į' => 'I', 'Ź' => 'Z', 'Á' => 'A',
          'Û' => 'U', 'Þ' => 'Th', 'Ð' => 'Dh', 'Æ' => 'Ae',
        );
   
   
        /**
         * Replace accented UTF-8 characters by unaccented ASCII-7 equivalents
         *
         * Use the optional parameter to just deaccent lower ($case = -1) or upper ($case = 1)
         * letters. Default is to deaccent both cases ($case = 0)
         *
         * @author Andreas Gohr <andi@splitbrain.org>
         */
        static function utf8_deaccent($string,$case=0){
          if($case <= 0){
            $string = str_replace(array_keys(self::$UTF8_LOWER_ACCENTS),array_values(self::$UTF8_LOWER_ACCENTS),$string);
          }
          if($case >= 0){
            $string = str_replace(array_keys(self::$UTF8_UPPER_ACCENTS),array_values(self::$UTF8_UPPER_ACCENTS),$string);
          }
          return $string;
        }
        
        static function utf8_strtolower($string){
          return strtr($string,self::$UTF8_UPPER_TO_LOWER);
        }

        static function rmvacc($string){
             return Utf8Utils::utf8_deaccent(Utf8Utils::utf8_deaccent($string,0),1) ;
        }
    }

?>