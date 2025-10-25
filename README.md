# 🚀 GoDeliveryPro

Sistema completo de otimização de entregas desenvolvido com **Laravel 10+**, **Vue 3**, **Vite** e **Tailwind CSS**. Plataforma moderna para cálculo de rotas, otimização de trajetos e gerenciamento eficiente de operações de delivery.

## 🎯 Sobre o Projeto

GoDeliveryPro é uma solução tecnológica avançada que ajuda empresas a otimizar suas operações de entregas. Com algoritmos inteligentes de roteamento, você pode:

- **Calcular rotas otimizadas** considerando trânsito, distância e tempo
- **Estimar tempo médio de entrega** baseado em dados históricos
- **Monitorar kilometragem total** para controle de custos
- **Otimizar trajetos automaticamente** para minimizar tempo e combustível
- **Monitorar entregas em tempo real** com atualizações automáticas
- **Gerar relatórios avançados** para análise de performance

## 📋 Funcionalidades

### 🗺️ Cálculo de Rotas

Algoritmos inteligentes que calculam as melhores rotas considerando trânsito, distância e tempo de entrega.

### ⏱️ Estimativa de Tempo

Previsão precisa do tempo médio de entrega baseada em dados históricos e condições atuais do trânsito.

### 📊 Kilometragem Total

Controle completo da distância percorrida com relatórios detalhados para otimização de custos.

### 🚀 Otimização de Trajetos

Reorganização automática de entregas para minimizar tempo e combustível gasto.

### 📱 Monitoramento em Tempo Real

Acompanhe o progresso das entregas com atualizações em tempo real e notificações automáticas.

### 📈 Relatórios Avançados

Análises detalhadas de performance com gráficos e métricas para tomada de decisões estratégicas.

## 🚀 Requisitos

- **PHP**: 8.1 ou superior
- **Composer**: 2.x
- **Node.js**: 18.x ou superior
- **MySQL**: 8.0 ou superior
- **Nginx**: 1.18+ (produção)
- **OpenSSL** (para certificados SSL)

## 📦 Instalação Local

### 1. Clonar e Instalar Dependências

```bash
# Clonar repositório
git clone <url-do-repositorio>
cd godeliverypro

# Instalar dependências PHP
composer install

# Instalar dependências Node.js
npm install
```

### 2. Configurar Ambiente

```bash
# Copiar arquivo de configuração
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

Edite o arquivo `.env` com suas configurações:

```env
APP_NAME="GoDeliveryPro"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=godeliverypro
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 3. Configurar Banco de Dados

```bash
# Criar banco de dados
mysql -u root -p
CREATE DATABASE godeliverypro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

# Executar migrations
php artisan migrate

# Criar link simbólico para storage público (se necessário)
php artisan storage:link
```

### 4. Executar Aplicação

```bash
# Terminal 1: Iniciar servidor Laravel
php artisan serve

# Terminal 2: Compilar assets do frontend
npm run dev
```

Acesse: **http://localhost:8000**

## 🐳 Instalação com Docker

### 1. Configurar Docker Compose

```bash
# Iniciar containers
docker-compose up -d

# Executar migrations dentro do container
docker-compose exec app php artisan migrate

# Criar link de storage
docker-compose exec app php artisan storage:link
```

### 2. Gerar Certificados SSL (Desenvolvimento)

```bash
# Criar diretório
mkdir -p nginx/ssl

# Gerar certificado auto-assinado (apenas para dev)
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout nginx/ssl/key.pem \
  -out nginx/ssl/cert.pem \
  -subj "/C=BR/ST=SP/L=SaoPaulo/O=GoDeliveryPro/CN=localhost"
```

### 3. Compilar Assets

```bash
# Instalar dependências
docker-compose exec app npm install

# Compilar para produção
docker-compose exec app npm run build
```

## 🌐 Deploy em Produção

### 1. Configurar Servidor

```bash
# Instalar dependências do sistema
sudo apt update
sudo apt install -y nginx mysql-server php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl

# Clonar repositório
git clone <url-do-repositorio> /var/www/godeliverypro
cd /var/www/godeliverypro

# Instalar dependências
composer install --no-dev --optimize-autoloader
npm install && npm run build
```

### 2. Configurar Nginx

```bash
# Copiar configuração
sudo cp nginx/site.conf /etc/nginx/sites-available/godeliverypro
sudo ln -s /etc/nginx/sites-available/godeliverypro /etc/nginx/sites-enabled/

# Editar configuração com seu domínio
sudo nano /etc/nginx/sites-available/godeliverypro
```

Edite as linhas:

```nginx
server_name seu-dominio.com www.seu-dominio.com;
```

### 3. Instalar Certificado SSL com Let's Encrypt

```bash
# Instalar Certbot
sudo apt install certbot python3-certbot-nginx

# Gerar certificado SSL
sudo certbot --nginx -d seu-dominio.com -d www.seu-dominio.com

# Certbot vai configurar automaticamente o Nginx
```

### 4. Configurar Permissões

```bash
# Definir proprietário correto
sudo chown -R www-data:www-data /var/www/godeliverypro

# Dar permissões adequadas
sudo chmod -R 755 /var/www/godeliverypro
sudo chmod -R 775 /var/www/godeliverypro/storage
sudo chmod -R 775 /var/www/godeliverypro/bootstrap/cache
```

### 5. Configurar .env para Produção

```bash
sudo nano /var/www/godeliverypro/.env
```

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seu-dominio.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=godeliverypro
DB_USERNAME=godeliverypro_user
DB_PASSWORD=senha_forte_aqui

# Configurar proxies confiáveis (IPs do seu servidor)
TRUSTED_PROXIES=127.0.0.1
```

### 6. Executar Migrations e Configurar

```bash
# Executar migrations
php artisan migrate --force

# Criar link de storage
php artisan storage:link

# Otimizar aplicação
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Reiniciar Serviços

```bash
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
```

## 💰 Planos de Preços

### Básico - R$ 29/mês

- Até 100 entregas/mês
- Cálculo de rotas básico
- Suporte por email

### Profissional - R$ 79/mês ⭐ Mais Popular

- Até 500 entregas/mês
- Otimização avançada
- Monitoramento em tempo real
- Suporte prioritário

### Enterprise - R$ 199/mês

- Entregas ilimitadas
- API personalizada
- Relatórios customizados
- Suporte dedicado

## 🔒 Segurança e Privacidade

### Compliance LGPD

Sistema desenvolvido seguindo as melhores práticas de privacidade e proteção de dados.

### Cookies e Consentimento

Implementação de modal de cookies com opções de preferências para o usuário:

- Cookies Essenciais
- Cookies de Performance
- Cookies de Funcionalidade
- Cookies de Marketing

### Proteção de Dados

- Dados criptografados em trânsito
- Validação de entrada em todas as requisições
- Proteção contra CSRF

## 🧪 Desenvolvimento

### Compilar Assets para Produção

```bash
npm run build
```

### Modo Desenvolvimento

```bash
# Terminal 1: Backend Laravel
php artisan serve

# Terminal 2: Frontend Vite
npm run dev
```

### Testes

```bash
# Executar testes PHPUnit
php artisan test
```

## 📁 Estrutura do Projeto

```
godeliverypro/
├── app/
│   └── Http/
│       └── Controllers/
│           └── Api/                   # Controllers da API (se aplicável)
├── nginx/
│   └── site.conf                      # Configuração Nginx
├── resources/
│   ├── js/
│   │   ├── app.js                     # Entry point Vue
│   │   ├── router.js                  # Configuração de rotas
│   │   ├── axios.js                   # Configuração Axios
│   │   └── components/
│   │       ├── App.vue                # Componente principal
│   │       ├── LandingPage.vue        # Landing page
│   │       ├── Header.vue             # Header com cookies
│   │       ├── Footer.vue             # Footer
│   │       ├── CookieModal.vue        # Modal de cookies
│   │       ├── ConsentCapture.vue     # Captura de consentimento
│   │       ├── Button.vue             # Componente de botão
│   │       ├── Card.vue               # Componente de card
│   │       └── icons/                 # Ícones SVG
│   └── css/
│       └── app.css                    # Estilos Tailwind
├── public/
│   ├── favicon.svg                    # Favicon do projeto
│   └── index.php                      # Entry point PHP
├── routes/
│   └── web.php                        # Rotas web
├── tests/
│   └── Feature/                       # Testes automatizados
├── docker-compose.yml                 # Docker Compose
├── Dockerfile                         # Dockerfile PHP-FPM
└── README.md                          # Este arquivo
```

## 🛠️ Tecnologias Utilizadas

- **Backend**: Laravel 10+
- **Frontend**: Vue 3 + Composition API
- **Build Tool**: Vite
- **Estilização**: Tailwind CSS 4.x
- **Roteamento**: Vue Router 4
- **HTTP Client**: Axios
- **Servidor Web**: Nginx
- **Runtime**: PHP 8.1+ (FPM)
- **Containerização**: Docker & Docker Compose

## 🎨 Componentes Principais

- **LandingPage**: Página principal com apresentação do produto
- **Header**: Cabeçalho com navegação e banner de cookies
- **Footer**: Rodapé com links e redes sociais (Instagram, LinkedIn)
- **CookieModal**: Modal de gerenciamento de preferências de cookies
- **ConsentCapture**: Captura de consentimento do usuário
- **Button**: Componente reutilizável de botão
- **Card**: Componente de card para funcionalidades

## 📝 Licença

Este projeto é fornecido "como está" para fins comerciais e educacionais.

## 🤝 Contribuindo

Contribuições são bem-vindas! Por favor:

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## 📞 Contato

Para dúvidas ou suporte:

- **Email**: contato@godeliverypro.com
- **Telefone**: (11) 99999-9999
- **Suporte**: suporte@godeliverypro.com

---

**Desenvolvido com ❤️ para otimizar suas entregas e transformar sua operação logística**
