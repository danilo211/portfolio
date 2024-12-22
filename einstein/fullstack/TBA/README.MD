# Projeto TBA (Trabalho Alex)

Este é um sistema online para gerenciar campeonatos de League of Legends.

## Estrutura do Projeto

A estrutura do projeto é organizada em várias pastas:

- **src/**: Contém todo o código fonte do projeto.
  - **user/**: Funcionalidades para usuários.
  - **admin/**: Funcionalidades para administradores.
  - **config/**: Configurações do banco de dados.
  - **database/**: Script SQL para criar o banco de dados.

## Como Rodar o Projeto

1. **Crie o Banco de Dados**: Execute o script `TBA.sql` no seu MySQL para criar as tabelas necessárias.
2. **Configurações do Banco de Dados**: Verifique o arquivo `database.php` e ajuste as credenciais de conexão conforme necessário.
3. **Ambiente de Desenvolvimento**: Utilize o XAMPP para rodar o projeto localmente.
4. **Acessar o Site**:
   - Acesse `src/user/index.php` para usuários.
   - Acesse `src/admin/index.php` para administradores.

## Funcionalidades

### Usuários
- Registro de novos usuários.
- Login para usuários existentes.
- Visualização de torneios disponíveis.

### Administradores
- Login com uma senha mestra.
- Gerenciamento de torneios e participantes.

## API
O projeto inclui APIs para:
- Registro e login de usuários.
- Listagem e gerenciamento de torneios.

## Contribuições
Sinta-se à vontade para contribuir com melhorias ou relatórios de bugs!
