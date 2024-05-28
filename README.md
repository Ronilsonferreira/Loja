# Loja

Este é um projeto de uma loja online desenvolvido em PHP como um teste.

## Visão Geral

Este projeto é uma loja online básica que permite aos usuários visualizar produtos, adicioná-los ao carrinho e finalizar a compra. O objetivo principal é praticar o desenvolvimento em PHP e a criação de aplicações web.

## Funcionalidades

- Listagem de produtos
- Detalhes do produto
- Adicionar produtos ao carrinho
- Remover produtos do carrinho
- Finalizar compra

## Tecnologias Utilizadas

- PHP
- MySQL 
- HTML/CSS
- JavaScript

## Instalação

1. Clone este repositório:
    ```bash
    git clone https://github.com/Ronilsonferreira/Loja.git
    ```
2. Navegue até o diretório do projeto:
    ```bash
    cd sua-loja-em-php
    ```
3. Configure o arquivo de banco de dados (substitua com suas configurações reais):
    ```php
    // database.php
    $host = 'localhost';
    $db = 'bancodedados';
    $user = 'user';
    $pass = 'passowrd';
    ```
4. Importe o arquivo SQL para o seu banco de dados:
    ```bash
    mysql -u seu_usuario -bancodedados < database.sql
    ```
5. Inicie o servidor local:
    ```bash
    php -S localhost:8000
    ```

## Uso

1. Acesse o navegador e vá para `http://localhost:8000`.
2. Explore a loja, adicione produtos ao carrinho e finalize a compra.

## Estrutura do Projeto

```plaintext
/
├── css/
├── js/
├── img/
├── templates/
├── index.php
├── product.php
├── cart.php
├── checkout.php
├── database.php
└── README.md

