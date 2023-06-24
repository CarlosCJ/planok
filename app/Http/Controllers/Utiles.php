<?php

class Utiles {

    /**
     * Capitaliza solo la primera letra
     */
    public static function capitalizaPrimeraPalabra($texto){
        $textoCapitalizadoPrimeraPalabra = ucfirst(strtolower($texto));
        return $textoCapitalizadoPrimeraPalabra;
    }

    /**
     * Calcula el DV de cada RUN
     */
    public static function calcularDV($run) {
        $run = str_replace(['.', '-'], '', $run);

        $reversedRun = strrev($run);
        $factor = 2;
        $sum = 0;

        for ($i = 0; $i < strlen($reversedRun); $i++) {
            $sum += intval($reversedRun[$i]) * $factor;
            $factor = $factor % 7 === 0 ? 2 : $factor + 1;
        }

        $dv = 11 - ($sum % 11);
        $dv = ($dv === 10) ? 'K' : ($dv === 11) ? '0' : strval($dv);

        $run = self::formatoRUN($run);
        return $run . '-' . $dv;
    }

    /**
     * Da formato al RUN 12.345.678
     */
    public static function formatoRUN($run){
        $formattedRun = '';
        while (strlen($run) > 3) {
            $formattedRun = '.' . substr($run, -3) . $formattedRun;
            $run = substr($run, 0, -3);
        }
        return $run . $formattedRun;
    }

    /**
     * Pone puntos a un número
     */
    public static function ponePuntosNumero($numero)
    {
        try {
            return '$ ' . number_format($numero, 0, ',', '.');
        } catch (Exception $ex) {
        }
    }

}
