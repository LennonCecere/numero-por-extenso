# Funções
## * NumeroPorExtenso
## * ValorPorExtenso
<br>

## NumeroPorExtenso

Para funcionar corretamente, o valor passado precisa ser no tipo **float ou int**, exemplo: `123.89` ou `12389`.
Caso contrário a biblioteca vai retornar um erro informando que o valor informado não é válido.

## Como usar 
Após instalar a biblioteca o método deve ser chamado desta forma:

NumeroPorExtenso::converter(123.89);

NumeroPorExtenso::converter(123.89);
<br>
<hr>

## ValorPorExtenso

Para funcionar corretamente, o valor passado precisa ser no tipo **float, int ou string**, exemplos válidos:

    123.45,       // Float válido
    'R$ 1.234,56', // String válida
    '123,45',      // String válida
    'R$1.234,56',  // String válida
    '1.234,56',    // String válida
    '123.456',     // String inválida
    123456,        // Inteiro válido (não é float ou no formato de moeda)
    'abc',         // String INVÁLIDA
    
Caso contrário a biblioteca vai retornar um erro informando que o valor informado não é válido.

## Como usar 
Após instalar a biblioteca o método deve ser chamado desta forma:

ValorPorExtenso::converter(123.45);

ValorPorExtenso::converter('R$ 1.234,56');

ValorPorExtenso::converter('123,45');

ValorPorExtenso::converter('R$1.234,56');

ValorPorExtenso::converter('1.234,56');

ValorPorExtenso::converter('123.456');

ValorPorExtenso::converter(123456);
