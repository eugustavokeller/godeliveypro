#!/bin/bash

# Script de Deploy para VPS
# Uso: ./deploy.sh

set -e

echo "🚀 Iniciando deploy do CatchMe..."

# Cores para output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Verificar se existe arquivo .env
if [ ! -f .env ]; then
    echo -e "${YELLOW}⚠️  Arquivo .env não encontrado.${NC}"
    if [ -f docker.env.example ]; then
        echo -e "${YELLOW}Criando .env a partir do exemplo...${NC}"
        cp docker.env.example .env
        echo -e "${GREEN}✓ Arquivo .env criado. Por favor, configure as variáveis de ambiente.${NC}"
        echo -e "${RED}❌ IMPORTANTE: Configure o banco de dados externo no arquivo .env antes de continuar!${NC}"
        exit 1
    else
        echo -e "${RED}❌ Erro: docker.env.example não encontrado!${NC}"
        exit 1
    fi
fi

# Construir imagens Docker
echo -e "${YELLOW}📦 Construindo imagens Docker...${NC}"
docker-compose build --no-cache

# Parar containers existentes
echo -e "${YELLOW}🛑 Parando containers existentes...${NC}"
docker-compose down

# Iniciar containers
echo -e "${YELLOW}▶️  Iniciando containers...${NC}"
docker-compose up -d

# Aguardar aplicação ficar pronta
echo -e "${YELLOW}⏳ Aguardando aplicação inicializar...${NC}"
sleep 5

# Executar migrations
echo -e "${YELLOW}🗄️  Executando migrations...${NC}"
docker-compose exec -T app php artisan migrate --force || echo -e "${RED}⚠️  Erro ao executar migrations. Verifique a conexão com o banco de dados.${NC}"

# Criar link de storage
echo -e "${YELLOW}🔗 Criando link de storage...${NC}"
docker-compose exec -T app php artisan storage:link || true

# Otimizar aplicação
echo -e "${YELLOW}⚡ Otimizando aplicação...${NC}"
docker-compose exec -T app php artisan config:cache || true
docker-compose exec -T app php artisan route:cache || true
docker-compose exec -T app php artisan view:cache || true

# Limpar cache
docker-compose exec -T app php artisan cache:clear || true

echo -e "${GREEN}✓ Deploy concluído com sucesso!${NC}"
echo -e "${GREEN}🎉 Aplicação disponível em http://seu-dominio.com${NC}"

# Mostrar logs
echo ""
echo "📋 Status dos containers:"
docker-compose ps
