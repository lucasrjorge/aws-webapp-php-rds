# aws-webapp-php-rds

Com certeza\! Baseado em todo o projeto que desenvolvemos, aqui está uma proposta completa e profissional para o seu arquivo `README.md`.

Este README é escrito em Markdown, o formato padrão do GitHub. Basta copiar todo o texto abaixo e colar no arquivo `README.md` do seu repositório.

-----

# Aplicação Web com AWS EC2 e RDS

Este repositório contém o código-fonte de uma aplicação web simples em PHP, desenvolvida para demonstrar a integração entre um servidor web hospedado em uma instância **Amazon EC2** e um banco de dados relacional gerenciado pelo **Amazon RDS**.

## 📝 Descrição do Projeto

O projeto foi criado como parte de um exercício prático para aplicar conhecimentos em computação em nuvem com a Amazon Web Services. A aplicação consiste em uma página web que permite o cadastro e a listagem de produtos, com os dados sendo armazenados de forma persistente em um banco de dados MariaDB no serviço RDS.

O objetivo principal foi seguir as boas práticas de deploy, incluindo a configuração correta de instâncias, grupos de segurança (Security Groups) e a conexão segura entre os serviços da AWS.

## 🎥 Vídeo de Demonstração

Assista a uma demonstração completa da aplicação em funcionamento e um tour pela infraestrutura configurada no console da AWS.

**➡️ [Assista ao vídeo aqui](https://drive.google.com/file/d/1xHa-E8rIYC_gzLP0J2cBrswGeKMUT2Q0/view?usp=sharing)**
**➡️ [E aqui!](https://drive.google.com/file/d/18HTtWNMD3aPbNLyWWnerO9Lvo9hr9n93/view?usp=sharing)**

-----

## 🚀 Tecnologias Utilizadas

  - **Cloud Provider:** Amazon Web Services (AWS)
  - **Serviços AWS:**
      - **Amazon EC2:** Servidor virtual para hospedar a aplicação web (Apache + PHP).
      - **Amazon RDS:** Serviço de banco de dados relacional gerenciado (MariaDB).
      - **VPC (Virtual Private Cloud):** Rede virtual isolada para os recursos.
  - **Linguagem:** PHP
  - **Banco de Dados:** MariaDB
  - **Servidor Web:** Apache

## ✨ Funcionalidades

  - **Cadastro de Produtos:** Formulário para inserir o nome e o preço de um novo produto no banco de dados.
  - **Listagem de Produtos:** Exibição em tempo real de todos os produtos cadastrados, ordenados do mais recente para o mais antigo.

-----

## 🛠️ Como Executar o Projeto

Para replicar este ambiente, siga os passos abaixo:

#### 1\. Configuração da Infraestrutura AWS

  - **Crie uma instância EC2:** Utilize uma AMI Amazon Linux 2023.
  - **Crie uma instância RDS:** Escolha a engine MariaDB.
  - **Configure os Security Groups:**
      - O Security Group da instância EC2 deve permitir tráfego de entrada na porta `80` (HTTP).
      - O Security Group da instância RDS deve permitir tráfego de entrada na porta `3306` (MySQL/MariaDB) **apenas** a partir do Security Group da sua instância EC2. Esta é a etapa mais importante para a segurança e funcionamento da conexão.

#### 2\. Instalação do Servidor Web na EC2

  - Conecte-se à sua instância EC2 via SSH.
  - Instale o Apache, PHP e o cliente MariaDB com os comandos:
    ```bash
    sudo dnf update -y
    sudo dnf install -y httpd php-mysqlnd mariadb105
    sudo systemctl start httpd
    sudo systemctl enable httpd
    ```

#### 3\. Configuração do Banco de Dados

  - Conecte-se ao seu banco de dados RDS a partir da sua instância EC2.
  - Execute o seguinte comando SQL para criar a tabela `Produtos`:
    ```sql
    CREATE TABLE Produtos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_produto VARCHAR(255) NOT NULL,
        preco DECIMAL(10, 2) NOT NULL,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

#### 4\. Deploy da Aplicação

  - Crie o arquivo `produtos.php` no diretório `/var/www/html` da sua instância EC2.
  - Insira o código contido neste repositório no arquivo.
  - **Importante:** Edite as variáveis de conexão com o banco de dados no topo do arquivo `produtos.php` com as suas credenciais do RDS (endpoint, nome do banco, usuário e senha).

-----
