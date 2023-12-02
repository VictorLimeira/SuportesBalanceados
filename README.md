# Sobre
O "Suportes Balanceados" valida se chaves, colchetes e parênteses possuem seus devidos pares de acordo com lógica
própria de pares.

Exemplos:

| Entrada          | Validação    |
| ---------------- | ------------ |
| `` (){}[] ``     | válido       |
| `` [{()}](){} `` | válido       |
| `` []{() ``      | não é válido |
| `` [{)] ``       | não é válido |

# Prerequisitos:
- Entendimento de php e comandos simples do docker;
- Instalados:
    1. Docker;
    2. Docker compose.


## 1. Instale dependências
>``$ docker compose run composer install ``

## 2. Rode os testes
>``$ docker compose run phpunit ``
