## Importante

Para funcionar corretamente, o valor passado precisa ser no tipo **string**, exemplo: `"123,89"`. 
Caso passe o valor como **float**, a biblioteca vai ignorar o ponto que separa a casa decimal do real do centavo e vai entender que o valor é outro, e não o valor real passado.

## Como usar 
Após instalar a biblioteca o método deve ser chamado desta forma:
NumeroPorExtenso::converter('123,89');
