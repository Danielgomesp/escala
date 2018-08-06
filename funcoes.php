<?php

function diasemana($data) {
    $a = substr("$data", 0, 4);
    $m = substr("$data", 5, -3);
    $d = substr("$data", 8, 9);
    $diasemana = date("w", mktime(0, 0, 0, $m, $d, $a));
    switch ($diasemana) {
        case"0": $diasemana = "2"; //domingo
            break;
        case"1": $diasemana = "0"; //segunda
            break;
        case"2": $diasemana = "0"; //terça
            break;
        case"3": $diasemana = "0"; //quarta
            break;
        case"4": $diasemana = "0"; //Quinta
            break;
        case"5": $diasemana = "0"; //sexta
            break;
        case"6": $diasemana = "1"; //sabado
            break;
    }return $diasemana;
     // retorna 1 em dias que não pode escalar. Retorna 0 em dias que podem.
}
//
//
//function diasemana2($d, $m, $a) {
//    $diasemana = date("w", mktime(0, 0, 0, $m, $d, $a));
//    switch ($diasemana) {
//        case"0": $diasemana = "2"; //domingo
//            break;
//        case"1": $diasemana = "0"; //segunda
//            break;
//        case"2": $diasemana = "0"; //terça
//            break;
//        case"3": $diasemana = "0"; //quarta
//            break;
//        case"4": $diasemana = "0"; //Quinta
//            break;
//        case"5": $diasemana = "0"; //sexta
//            break;
//        case"6": $diasemana = "1"; //sabado
//            break;
//    }echo "$diasemana";  // retorna 1 em dias que não pode escalar. Retorna 0 em dias que podem.
//}