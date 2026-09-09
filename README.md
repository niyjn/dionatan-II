

## Como Executar o Projeto Localmente

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
