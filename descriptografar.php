<?php

$chave = '70678'; // chave de 5 bits para criptografar o texto
$texto = 'htgjiyghvgtlpvgkph'; // texto a ser criptografado
echo 'texto criptografado: ' . $texto;
if (strlen($chave) == 5) {
    for ($i = 0; $i < strlen($texto); $i++) { //estrutura de repetição para percorrer todo o texto (a função strlen() retorna o comprimento da variável)
        $contador = $i;
        if ($contador >= 5) { // estrutura de condição para reiniciar a chave quando os 5 bits dela forem utilizados
            $contador = -5;
        }
        $original = sprintf("%02d", ord(strtolower($texto[$i])) - 96); // conversão dos caracteres originais para a tabela ASCII; sprintf("%02d", $) preenche com 0 a variável para que ela tenha 2 casas decimais; ord($) converte a variável conforme seu valor na tabela ASCII; strtolower($) converte os todos os caracteres alfabéticos para a forma minúscula
        if (ord(strtolower($texto[$i])) == 32) {
            $original = 0;
        }
    }
    echo '<br> texto descriptografado: ';
    for ($i = 0; $i < strlen($texto); $i++) {
        $contador = $i;
        if ($contador >= 5) {
            $contador = -5;
        }
        $original = sprintf("%02d", ord(strtolower($texto[$i])) - 96);
        if (ord(strtolower($texto[$i])) == 32) {
            $original = 0;
        }
        $criptografado = sprintf("%02d", $original - (int)$chave[$contador]); // (int)$ converte a variável para o tipo inteiro
        if ($criptografado == 0) {
            $criptografado = -64;
        }
        echo chr((int)$criptografado + 96); // echo imprime a mensagem (nesse caso, a criptografada); chr(int$) converte um número em seu caracter na tabela ASCII
    }
} else {
    echo 'Chave inválida!';
}