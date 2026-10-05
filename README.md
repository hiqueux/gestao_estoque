# Sistema de Gestão de Estoque

## Objetivo

O Sistema de Gestão de Estoque foi desenvolvido para facilitar o controle dos produtos de um mercado. Com ele, é possível cadastrar, visualizar, editar e excluir produtos, mantendo as informações organizadas no banco de dados. Cada produto possui informações como nome, categoria, descrição, preço, quantidade em estoque e data de validade.

## Tecnologias

O projeto foi desenvolvido utilizando, a qual utilizam Prepared Statements:

- PHP
- MySQL
- HTML
- CSS
- XAMPP
- Visual Studio Code
- Git e GitHub

## Requisitos

Para executar o projeto, é necessário ter:

- XAMPP
- PHP
- MySQL
- Navegador
- Visual Studio Code

## Instalação e configuração

1. Primeiramente, coloque a pasta do projeto dentro da pasta `htdocs` do XAMPP.

2. Depois, abra o XAMPP e inicie o **Apache** e o **MySQL**.

3. Acesse o **phpMyAdmin** pelo botão **Admin** do MySQL e execute o arquivo: `database/db.sql`. Esse arquivo cria o banco de dados e a tabela utilizada pelo sistema.

4. Depois, verifique o arquivo: `infra/conexao.php`. Nele estão as informações utilizadas para conectar o sistema ao banco de dados.

5. Com o Apache e o MySQL funcionando, abra o navegador e acesse: `http://localhost/GESTAO_ESTOQUE/`

## Estrutura do banco de dados

A tabela `produtos` possui os seguintes campos:

- `id` - identificador do produto;
- `nome` - nome do produto;
- `categoria` - categoria do produto;
- `descricao` - descrição do produto;
- `preco` - preço do produto;
- `quantidade_estoque` - quantidade disponível;
- `data_validade` - data de validade do produto.

## Funcionalidades

O sistema possui as seguintes funcionalidades:

- Cadastro de produtos;
- Visualização dos produtos cadastrados;
- Edição dos dados dos produtos;
- Exclusão de produtos;
- Validação dos dados recebidos;
- Uso de Prepared Statements.

## Caso de Uso

A documentação do caso de uso está disponível na pasta `docs`. O sistema possui um ator principal:

- Funcionário.

O funcionário pode cadastrar, visualizar, editar e excluir produtos.

![Texto alternativo da imagem](docs/Diagrama%20de%20uso%20-%20Sistema%20de%20Estoque.drawio.png)

## Estrutura do projeto

```text
GESTAO_ESTOQUE
│
├── database
│   └── db.sql
│
├── infra
│   └── conexao.php
│
├── public
│   ├── cadastrar.php
│   ├── editar.php
│   ├── atualizar.php
│   └── excluir.php
│
├── style
│   └── styles.css
│
├── docs
│   ├── caso_de_uso.md
│   └── diagrama_caso_de_uso.png
│
├── index.php
│
└── README.md