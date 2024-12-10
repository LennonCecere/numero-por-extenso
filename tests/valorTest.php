<?php

require 'vendor/autoload.php';

use LennonCecere\ValorPorExtenso;

echo "Iniciando o teste...\n";

try {
//	echo ValorPorExtenso::converter(123.89);
	echo ValorPorExtenso::converter('R$ 123,89');

} catch (Throwable $e) {
	echo "Erro: " . $e->getMessage();
}

echo "\nFinalizando o teste.\n";
