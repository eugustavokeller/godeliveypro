#!/bin/bash

# Script de teste para API CatchMe Location Tracker
# Uso: ./test-api.sh [base_url]

BASE_URL="${1:-http://localhost:8000}"

echo "🧪 Testando API CatchMe Location Tracker"
echo "========================================"
echo "Base URL: $BASE_URL"
echo ""

# Verificar se jq está instalado
if ! command -v jq &> /dev/null; then
    echo "⚠️  jq não está instalado. Instalando..."
    if [[ "$OSTYPE" == "darwin"* ]]; then
        brew install jq
    elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
        sudo apt-get install -y jq
    fi
fi

# Teste 1: Verificar IP
echo "1️⃣ Testando endpoint /api/whoami"
echo "-----------------------------------"
WHOAMI_RESPONSE=$(curl -s -X GET "$BASE_URL/api/whoami")
echo "$WHOAMI_RESPONSE" | jq .
echo ""

# Teste 2: Enviar localização
echo "2️⃣ Testando endpoint /api/log"
echo "-----------------------------------"
LOG_RESPONSE=$(curl -s -X POST "$BASE_URL/api/log" \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": -23.5505,
    "longitude": -46.6333,
    "accuracy": 10.5,
    "note": "Teste automatizado via script"
  }')
echo "$LOG_RESPONSE" | jq .
echo ""

# Teste 3: Validação - Latitude inválida
echo "3️⃣ Testando validação - Latitude inválida"
echo "-----------------------------------"
VALIDATION_RESPONSE=$(curl -s -X POST "$BASE_URL/api/log" \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": 100,
    "longitude": -46.6333
  }')
echo "$VALIDATION_RESPONSE" | jq .
echo ""

# Teste 4: Upload de foto (se imagem existir)
if [ -f "teste.jpg" ]; then
  echo "4️⃣ Testando endpoint /api/upload-photo"
  echo "-----------------------------------"
  PHOTO_RESPONSE=$(curl -s -X POST "$BASE_URL/api/upload-photo" \
    -F "photo=@teste.jpg" \
    -F "note=Teste automatizado via script")
  echo "$PHOTO_RESPONSE" | jq .
else
  echo "4️⃣ Pulando teste de upload (arquivo teste.jpg não encontrado)"
  echo "   Para testar upload, crie uma imagem chamada 'teste.jpg' no diretório atual"
fi
echo ""

echo "✅ Testes concluídos!"
echo ""
echo "💡 Dica: Verifique os logs em storage/logs/proofs.log para auditoria"
echo "   tail -f storage/logs/proofs.log"

