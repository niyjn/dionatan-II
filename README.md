# Projeto Acadêmico - Sistema de Gestão Escolar (Laravel + Breeze)

Este repositório contém a resolução integral de todas as atividades propostas na disciplina, implementado em **Laravel 12** utilizando **Laravel Breeze** (stack Blade), **Tailwind CSS**, banco de dados SQLite/MySQL e recursos avançados do framework (Eloquent Scopes, Relacionamentos, Seeders, Form Requests, Middlewares e Policies).

> **Padrão de entrega seguido à risca:**
> - **Cada TEMA é uma BRANCH**
> - **Cada ATIVIDADE (ATV) é um COMMIT**
> - A branch `main` consolida o projeto completo finalizado.

---

## 🌿 Estrutura de Branches e Temas

| Tema | Branch | Descrição Resumida |
| :--- | :--- | :--- |
| **Tema 1** | `tema-1` / `tema-1-rotas` | Rotas simples e rotas com parâmetros |
| **Tema 2** | `tema-2` / `tema-2-controllers` | Criação do AlunoController e mapeamento dos 7 métodos de CRUD |
| **Tema 3** | `tema-3` / `tema-3-views` | Criação da pasta de views e páginas principais |
| **Tema 4** | `tema-4` / `tema-4-blade` | Layout base, diretivas Blade (@extends, @section, @include, @if, @foreach) e menu de navegação |
| **Tema 5** | `tema-5` / `tema-5-models-eloquent` | Model Aluno, migração e consultas Eloquent (scopes de curso, nome, recentes e contagem) |
| **Tema 6** | `tema-6` / `tema-6-seeders` | AlunoFactory e AlunoSeeder gerando 10 alunos |
| **Tema 7** | `tema-7` / `tema-7-crud` | CRUD completo funcional no AlunoController e Views |
| **Tema 8** | `tema-8` / `tema-8-forms-requests` | AlunoRequest com validação avançada, mensagens personalizadas e formulário com feedback |
| **Tema 9** | `tema-9` / `tema-9-relacionamentos` | Model Curso, chave estrangeira `curso_id`, relacionamentos hasMany/belongsTo e view detalhada |
| **Tema 10** | `tema-10` / `tema-10-autenticacao` | Laravel Breeze, relacionamento User-Aluno e campo `role` ('admin' e 'professor') |
| **Tema 11** | `tema-11` / `tema-11-middleware` | Middleware `CheckRole` para proteção de rotas restritas (`/admin` e `/professor`) |
| **Tema 12** | `tema-12` / `tema-12-policies` | `AlunoPolicy` restringindo ações por perfil (Admin cadastra/exclui, Professor edita) |

---

## 📌 Histórico de Commits por Atividade

1. `ATV 1: Criar rotas /sobre, /alunos e /contato retornando texto`
2. `ATV 2: Criar rotas com parametro /produto/{id}, /categoria/{id} e /usuario/{id}`
3. `ATV 3: Criar o AlunoController`
4. `ATV 4: Implementar as 7 rotas principais de CRUD no AlunoController`
5. `ATV 5: Criar a pasta alunos nas views`
6. `ATV 6: Crie as views principais (index, create, show, edit)`
7. `ATV 7: Crie um layout para ser utilizado por outras paginas em /layouts/app.blade.php`
8. `ATV 8: Criar paginas home e views de alunos usando layout`
9. `ATV 9: Utilizar diretivas Blade e criar menu de navegacao compartilhado (Desafio)`
10. `ATV 10: Criar o Model Aluno e migration correspondente`
11. `ATV 11: Implementar consultas Eloquent de curso, nome, recentes e quantidade`
12. `ATV 12: Criar o Seeder para Alunos e gerar 10 alunos`
13. `ATV 13: Implementar o CRUD completo para Alunos no Controller e Views`
14. `ATV 14: Criar o formulario de cadastro de Aluno completo com validacoes visuais`
15. `ATV 15: Criar o Request para Alunos com validacoes e mensagens personalizadas (Desafio)`
16. `ATV 16: Criar o Model Curso para se relacionar com Alunos`
17. `ATV 17: Relacionar Aluno e Curso atraves de chave estrangeira curso_id (hasMany / belongsTo)`
18. `Desafio Tema 9: Exibir em view todos os alunos vinculados a um curso`
19. `ATV 18: Adicionar o Laravel Breeze no projeto com suporte a Blade`
20. `ATV 19: Relacionar User com Aluno atraves de chave estrangeira user_id`
21. `ATV 20: Adicionar campo role no User com dois tipos (admin e professor)`
22. `ATV 21: Criar Middleware CheckRole para impedir acesso indevido em rotas como /admin e /professor`
23. `ATV 22: Criar AlunoPolicy para proteger acoes sobre o registro de Aluno`
24. `ATV 23: Implementar regras na AlunoPolicy (apenas Admin cria e exclui, Professor edita)`

---

## 🚀 Como Executar o Projeto Localmente

### 1. Clonar o repositório ou abrir a pasta do projeto:
```bash
cd dionatan-II
```

### 2. Instalar dependências PHP e JavaScript:
```bash
composer install
npm install
npm run build
```

### 3. Configurar ambiente e chave de aplicação:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Executar Migrações e Seeders:
```bash
php artisan migrate:fresh --seed
```
> O comando acima criará as tabelas, os usuários padrão (Admin e Professor), cursos e 10 alunos com matrículas e relacionamentos!

### 5. Iniciar o servidor local:
```bash
php artisan serve
```
Acesse no navegador: `http://localhost:8000`

---

## 🔐 Credenciais de Acesso para Teste

| Perfil | E-mail | Senha | Permissões |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@escola.com` | `password` | Acesso a `/admin`, cria alunos, edita alunos e exclui alunos |
| **Professor** | `professor@escola.com` | `password` | Acesso a `/professor`, visualiza e edita alunos |
| **Visitante** | (não logado) | - | Acesso público às páginas informativas e listagem |

---

## 🧭 Principais Rotas e Endpoints

### Rotas Gerais e CRUD
- `GET /` e `GET /home` - Página inicial com layout compartilhado
- `GET /sobre` - Página sobre (Tema 1)
- `GET /contato` - Página contato (Tema 1)
- `GET /produto/{id}` - Rota com parâmetro (Tema 1)
- `GET /categoria/{id}` - Rota com parâmetro (Tema 1)
- `GET /usuario/{id}` - Rota com parâmetro (Tema 1)
- `GET /alunos` - Listagem de alunos (Tema 2, 3, 4, 7, 12)
- `GET /alunos/create` - Formulário de cadastro (Protegido pela Policy: apenas Admin)
- `POST /alunos` - Salvar aluno com validação pelo AlunoRequest (Apenas Admin)
- `GET /alunos/{id}` - Ficha detalhada do aluno
- `GET /alunos/{id}/edit` - Formulário de edição (Admin e Professor)
- `PUT /alunos/{id}` - Atualizar aluno
- `DELETE /alunos/{id}` - Excluir aluno (Apenas Admin)

### Consultas Eloquent (Tema 5)
- `GET /consultas/curso/{curso}` - Alunos filtrados pelo nome do curso
- `GET /consultas/busca/{palavra}` - Alunos cujo nome contém o termo buscado
- `GET /consultas/recentes` - Alunos cadastrados nos últimos 30 dias
- `GET /consultas/quantidade` - Quantidade total de alunos registrados

### Relacionamentos (Tema 9)
- `GET /cursos/{curso}/alunos` - Exibe em view todos os alunos vinculados ao curso especificado

### Autenticação & Áreas Restritas (Temas 10, 11 e 12)
- `GET /login` e `GET /register` - Autenticação Laravel Breeze
- `GET /dashboard` - Painel autenticado do usuário
- `GET /admin` - Painel restrito a usuários com `role = 'admin'` (Middleware `role:admin`)
- `GET /professor` - Painel restrito a `role = 'professor'` e `'admin'` (Middleware `role:professor,admin`)