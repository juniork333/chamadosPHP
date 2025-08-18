# Sistema de Cadastro de Chamados

## Descrição

Este sistema foi desenvolvido para gerenciar chamados de forma simples e prática.  
Com ele é possível:

- Cadastrar novos chamados
- Editar chamados existentes
- Visualizar detalhes de um chamado
- Listar todos os chamados cadastrados

---

## Tecnologias Utilizadas

### **Backend (API)**

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- Banco de dados (MySQL)

### **Frontend (Interface)**

- [Vue.js 3](https://vuejs.org/)
- [Vite](https://vitejs.dev/)
- [Bootstrap](https://getbootstrap.com/)
- [Axios](https://axios-http.com/)
- [Font Awesome](https://fontawesome.com)

---

## Instalação e Execução

### 1. Clonar o repositório

```bash
git clone https://github.com/gracianoojr/chamadosPHP.git
```

### 2. Configuração do Backend (Sistema-chamados)

- 2.1 cd Sistema-chamados (entra na pasta do backend)

- 2.2 composer install (instala dependências do PHP)

- 2.3 .env.example (copie o .env.example crie um .env e cole as informaçoes)

- 2.4 php artisan key:generate (Apos cria o .env de o comando que cria a key)

### 3. Crie o banco de dados com o comando:

- CREATE DATABASE nome_do_banco_de_dados;

# Edite o arquivo (.env) e configure de acordo com o banco de dados:

- DB_CONNECTION=mysql
- DB_HOST="HOST DO BANCO"
- DB_PORT="PORTA DO BANCO"
- DB_DATABASE= "NOME DA DATABASE"
- DB_USERNAME= "NOME DO BANCO"
- DB_PASSWORD= "SENHA DO BANCO"

# Depois rode:

- php artisan migrate --seed (cria as tabelas )
- php artisan serve (inicia o servidor em http://127.0.0.1:8000)

### 3. Configuração do Frontend (frontend-vue)

- cd frontend-vue
- npm install (instala dependências do Vue)
- npm run dev (inicia o servidor em http://localhost:5173)

### Login Padrão:

- Usuário: admin
- Senha: 1234

### Estrutura do Projeto:

┣ Sistema-chamados (Backend)
┣ frontend-vue (Frontend)
┣ README.md
