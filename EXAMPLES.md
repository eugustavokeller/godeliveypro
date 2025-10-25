# 📝 Exemplos de Uso da API

Este documento contém exemplos práticos de como usar a API do CatchMe Location Tracker.

## 🔧 Requisitos

- cURL instalado
- Aplicação rodando (local ou produção)
- Base URL: `http://localhost:8000` (desenvolvimento) ou `https://seu-dominio.com` (produção)

## 📍 Endpoint de Debug

### GET /api/whoami

Verificar IP detectado e informações do cliente.

```bash
curl -X GET http://localhost:8000/api/whoami \
  -H "Accept: application/json"
```

**Resposta:**

```json
{
  "ip": "127.0.0.1",
  "user_agent": "curl/7.68.0",
  "all_headers": {
    "host": ["localhost:8000"],
    "accept": ["application/json"]
  }
}
```

## 📊 Endpoint de Log de Localização

### POST /api/log

Registrar localização geográfica.

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "latitude": -23.5505,
    "longitude": -46.6333,
    "accuracy": 10.5,
    "note": "Enviado via cURL para teste"
  }'
```

**Resposta (Sucesso):**

```json
{
  "ok": true,
  "id": 1,
  "message": "Localização registrada com sucesso"
}
```

**Resposta (Erro de Validação):**

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "latitude": ["A latitude é obrigatória"]
  }
}
```

### Exemplo com Coordenadas de São Paulo

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": -23.5505,
    "longitude": -46.6333,
    "accuracy": 15.0,
    "note": "Teste - São Paulo, SP"
  }'
```

### Exemplo com Coordenadas do Rio de Janeiro

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": -22.9068,
    "longitude": -43.1729,
    "accuracy": 20.0,
    "note": "Teste - Rio de Janeiro, RJ"
  }'
```

## 📸 Endpoint de Upload de Foto

### POST /api/upload-photo

Enviar foto capturada ou arquivo de imagem.

```bash
curl -X POST http://localhost:8000/api/upload-photo \
  -H "Accept: application/json" \
  -F "photo=@/caminho/para/imagem.jpg" \
  -F "note=Foto enviada via teste cURL"
```

**Resposta (Sucesso):**

```json
{
  "ok": true,
  "id": 1,
  "filename": "photo_1234567890.jpg",
  "url": "/storage/photos/photo_1234567890.jpg",
  "message": "Foto enviada com sucesso"
}
```

### Criar Imagem de Teste

No Linux/Mac:

```bash
# Criar imagem PNG de teste
convert -size 800x600 xc:blue -pointsize 72 -fill white -gravity center \
  -annotate +0+0 "Teste CatchMe" /tmp/teste.jpg

# Enviar imagem
curl -X POST http://localhost:8000/api/upload-photo \
  -F "photo=@/tmp/teste.jpg" \
  -F "note=Imagem de teste gerada"
```

### Upload com Câmera no Navegador

Abra o DevTools (F12) no navegador e execute:

```javascript
// Capturar foto da câmera
navigator.mediaDevices.getUserMedia({ video: true }).then((stream) => {
  const video = document.createElement("video");
  video.srcObject = stream;
  video.play();

  setTimeout(() => {
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(video, 0, 0);

    canvas.toBlob((blob) => {
      const formData = new FormData();
      formData.append("photo", blob, "photo.jpg");
      formData.append("note", "Enviado via DevTools");

      fetch("/api/upload-photo", {
        method: "POST",
        body: formData,
      })
        .then((r) => r.json())
        .then(console.log);

      stream.getTracks().forEach((t) => t.stop());
    }, "image/jpeg");
  }, 500);
});
```

## 🧪 Testes Automatizados

### Script de Teste Completo

Salve como `test-api.sh`:

```bash
#!/bin/bash

BASE_URL="http://localhost:8000"

echo "🧪 Testando API CatchMe Location Tracker"
echo "========================================"

# Teste 1: Verificar IP
echo ""
echo "1️⃣ Testando endpoint /api/whoami"
curl -s -X GET "$BASE_URL/api/whoami" | jq .
echo ""

# Teste 2: Enviar localização
echo "2️⃣ Testando endpoint /api/log"
curl -s -X POST "$BASE_URL/api/log" \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": -23.5505,
    "longitude": -46.6333,
    "accuracy": 10.5,
    "note": "Teste automatizado"
  }' | jq .
echo ""

# Teste 3: Upload de foto (requer imagem)
if [ -f "teste.jpg" ]; then
  echo "3️⃣ Testando endpoint /api/upload-photo"
  curl -s -X POST "$BASE_URL/api/upload-photo" \
    -F "photo=@teste.jpg" \
    -F "note=Teste automatizado" | jq .
else
  echo "3️⃣ Pulando teste de upload (imagem não encontrada)"
fi

echo ""
echo "✅ Testes concluídos!"
```

Execute:

```bash
chmod +x test-api.sh
./test-api.sh
```

## 🚫 Testes de Validação

### Latitude Inválida (> 90)

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": 100,
    "longitude": -46.6333
  }'
```

### Longitude Inválida (> 180)

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -d '{
    "latitude": -23.5505,
    "longitude": 200
  }'
```

### Arquivo Muito Grande (> 5MB)

```bash
# Criar arquivo grande
dd if=/dev/zero of=grande.jpg bs=1M count=6

curl -X POST http://localhost:8000/api/upload-photo \
  -F "photo=@grande.jpg"
```

### Arquivo Não-Imagem

```bash
curl -X POST http://localhost:8000/api/upload-photo \
  -F "photo=@arquivo.pdf"
```

## 🔍 Verificar Logs Append-Only

```bash
# Ver logs imutáveis
tail -f storage/logs/proofs.log

# Formatar JSON dos logs
tail -n 10 storage/logs/proofs.log | while read line; do
  echo "$line" | jq .
done
```

## 📊 Consultar Banco de Dados

```bash
# MySQL
mysql -u root -p catchme

# Listar logs de acesso
SELECT * FROM access_logs ORDER BY created_at DESC LIMIT 10;

# Listar fotos
SELECT * FROM photos ORDER BY created_at DESC LIMIT 10;

# Estatísticas
SELECT
  COUNT(*) as total_logs,
  COUNT(DISTINCT ip) as ips_unicos,
  DATE(created_at) as data
FROM access_logs
GROUP BY DATE(created_at)
ORDER BY data DESC;
```

## 🌐 Testes com HTTPS (Produção)

```bash
# Substituir localhost pelo seu domínio
BASE_URL="https://seu-dominio.com"

# Teste básico
curl -X GET "$BASE_URL/api/whoami" | jq .

# Verificar certificado SSL
curl -vI "$BASE_URL" 2>&1 | grep "SSL certificate"
```

## 📱 Testes com JavaScript/Fetch

```javascript
// Obter localização e enviar
navigator.geolocation.getCurrentPosition(
  async (position) => {
    const data = {
      latitude: position.coords.latitude,
      longitude: position.coords.longitude,
      accuracy: position.coords.accuracy,
      note: "Enviado via JavaScript",
    };

    const response = await fetch("/api/log", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(data),
    });

    const result = await response.json();
    console.log("Sucesso:", result);
  },
  (error) => {
    console.error("Erro:", error);
  }
);
```

## 🎯 Casos de Uso Práticos

### 1. Rastreamento com Verificação de IP

```bash
curl -X POST http://localhost:8000/api/log \
  -H "Content-Type: application/json" \
  -H "X-Forwarded-For: 192.168.1.100" \
  -d '{
    "latitude": -23.5505,
    "longitude": -46.6333,
    "accuracy": 10.5
  }'

# Verificar IP registrado
curl http://localhost:8000/api/whoami | jq .ip
```

### 2. Upload em Lote

```bash
# Script para enviar múltiplas fotos
for img in /fotos/*.jpg; do
  echo "Enviando: $img"
  curl -X POST http://localhost:8000/api/upload-photo \
    -F "photo=@$img" \
    -F "note=Batch upload"
done
```

---

**Para mais informações, consulte o README.md principal.**
