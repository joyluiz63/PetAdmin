<?php
/* Para criar uma função global, não esquecer de acrescentar no arquivo composer.json
"autoload-dev": { <- NESTE LOCAL
        "psr-4": {
            "Tests\\": "tests/"
        },
        "files": ["app/Helpers/functions.php"] <- ESTA LINHA
    },

    APÓS INCLUIDO, RODAR NO TERMINAL O COMANDO composer dump-autoload
*/

function calculaIdade($data) {

    $birthDate = new DateTime($data); // Data de nascimento
    $interval = $birthDate->diff( new DateTime( ) ); // data e hora atual

    return $interval->format( '%Y Anos, %m Mes(es), %d Dia(s)' ); // Saida exemplo: 11 Anos, 2 Meses, 3 Dias
}
