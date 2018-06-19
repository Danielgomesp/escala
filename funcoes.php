<?php

function diasemana($data) {
    $ano = substr("$data", 0, 4);
    $mes = substr("$data", 5, -3);
    $dia = substr("$data", 8, 9);
    $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
    switch ($diasemana) {
        case"0": $diasemana = "1"; //domingo
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
    }echo "$diasemana";  // retorna 1 em dias que não pode escalar. Retorna 0 em dias que podem.
}
