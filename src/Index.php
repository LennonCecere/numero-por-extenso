<?php

namespace NumeroPorExtenso;

class NumeroPorExtenso
{
	public static function converter(float $numero)
	{
		$unidades = ['', 'um', 'dois', 'três', 'quatro', 'cinco', 'seis', 'sete', 'oito', 'nove', 'dez', 'onze', 'doze', 'treze', 'quatorze', 'quinze', 'dezesseis', 'dezessete', 'dezoito', 'dezenove'];
		$dezenas = ['', '', 'vinte', 'trinta', 'quarenta', 'cinquenta', 'sessenta', 'setenta', 'oitenta', 'noventa'];
		$centenas = ['', 'cem', 'duzentos', 'trezentos', 'quatrocentos', 'quinhentos', 'seiscentos', 'setecentos', 'oitocentos', 'novecentos'];
		$milhares = ['', 'mil', 'milhão', 'bilhão', 'trilhão'];

		// Tratar separador decimal
		$numero = str_replace([','], ['.'], $numero);
		$parteInteira = floor($numero);
		$parteDecimal = ($numero - $parteInteira) * 100;

		// Função recursiva para converter a parte inteira
		$extensoInteiro = self::convertNumberToWords($parteInteira, $unidades, $dezenas, $centenas, $milhares);

		// Converte a parte decimal para extenso sem escalas
		$extensoDecimal = self::convertNumberToWords($parteDecimal, $unidades, $dezenas, $centenas, $milhares);

		return ucfirst("{$extensoInteiro} reais e {$extensoDecimal} centavos");
	}

	private static function convertNumberToWords($number, $unidades, $dezenas, $centenas, $milhares)
	{
		if ($number == 0) {
			return 'zero';
		}

		$extenso = '';
		$i = 0;

		while ($number > 0) {
			if ($number % 1000 != 0) {
				$extenso = self::convertHundreds($number % 1000, $unidades, $dezenas, $centenas) . ($milhares[$i] ? ' ' . $milhares[$i] : '') . ' ' . $extenso;
			}
			$number = (int)($number / 1000);
			$i++;
		}

		return trim($extenso);
	}

	private static function convertHundreds($number, $unidades, $dezenas, $centenas)
	{
		$extenso = '';

		if ($number >= 100) {
			$extenso .= $centenas[(int)($number / 100)] . ' e ';
			$number %= 100;
		}

		if ($number >= 20) {
			$extenso .= $dezenas[(int)($number / 10)] . ' e ';
			$number %= 10;
		}

		if ($number > 0) {
			$extenso .= $unidades[$number] . ' ';
		}

		return trim($extenso);
	}
}