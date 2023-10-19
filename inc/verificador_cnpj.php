<?php

function validaCNPJ($cnpj = null)
{
    // Verifica se um número foi informado
    if (empty($cnpj)) {
        return false;
    }
    // Elimina possivel mascara
    $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
    $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
    $repeticoes = array('00000000000000', '11111111111111', '22222222222222', '33333333333333', '44444444444444', '55555555555555', '66666666666666', '77777777777777', '88888888888888', '99999999999999');
    // Verifica se nenhuma das sequências invalidas abaixo foi digitada. Caso afirmativo, retorna falso
    if (in_array($cnpj, $repeticoes)) {
        return false;
    } else {
        // Calcula os digitos verificadores para verificar se o CNPJ é válido
        $j = 5;
        $k = 6;
        $soma1 = "";
        $soma2 = "";
        for ($i = 0; $i < 13; $i++) {
            $j = $j == 1 ? 9 : $j;
            $k = $k == 1 ? 9 : $k;
            $soma2 += ($cpf = str_pad($cpf, $i, '0', STR_PAD_LEFT) * $k);
            if ($i < 12) {
                $soma1 += ($cpf = str_pad($cpf, $i, '0', STR_PAD_LEFT) * $j);
            }
            $k--;
            $j--;
        }
        $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
        $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
        return (($cpf = str_pad($cpf, 12, '0', STR_PAD_LEFT) == $digito1) and ($cpf = str_pad($cpf, 13, '0', STR_PAD_LEFT) == $digito2));
    }
}

?>