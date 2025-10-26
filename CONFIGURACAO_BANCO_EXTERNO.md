# 🔌 Configuração do Banco de Dados Externo

Este projeto está configurado para usar um banco de dados **externo** ao Docker, permitindo que você use qualquer servidor MySQL gerenciado ou sua própria instância.

## 📝 Configuração

### 1. Editar Variáveis de Ambiente

Copie o arquivo de exemplo e edite:

```bash
cp docker.env.example .env
nano .env
```

Configure as seguintes variáveis:

```env
# Configuração do Banco de Dados EXTERNO
DB_HOST=seu-servidor-mysql.com
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario_do_banco
DB_PASSWORD=senha_do_banco
```

### 2. Opções de Conexão

#### Conexão por IP/Hostname

Se seu banco está em outro servidor:

```env
DB_HOST=mysql.exemplo.com
DB_PORT=3306
```

#### Conexão por IP Privado (mesma VPS, diferente container)

```env
DB_HOST=10.0.0.100
DB_PORT=3306
```

#### Conexão Local (host da VPS)

Se o MySQL está rodando no host da VPS (não no Docker):

```env
DB_HOST=host.docker.internal
DB_PORT=3306
```

**Nota**: O `docker-compose.yml` já inclui `host.docker.internal` para permitir conexões com serviços do host.

### 3. Testar Conexão

Após subir os containers, teste a conexão:

```bash
docker-compose exec app php artisan tinker

# No tinker, execute:
DB::connection()->getPdo();
```

Se a conexão for bem-sucedida, você verá informações sobre a conexão.

## 🔐 Segurança

### Firewall

Certifique-se de que o firewall permita conexões do seu servidor Docker para o banco de dados:

```bash
# No servidor do banco de dados, adicione regra de firewall
ufw allow from SEU_IP_VPS to any port 3306
```

### Usuário do Banco

Recomendamos criar um usuário específico para a aplicação:

```sql
CREATE USER 'catchme_user'@'IP_DO_SERVIDOR' IDENTIFIED BY 'senha_forte';
GRANT ALL PRIVILEGES ON catchme.* TO 'catchme_user'@'IP_DO_SERVIDOR';
FLUSH PRIVILEGES;
```

### Conexão SSL (Opcional)

Se seu banco suporta SSL, configure no arquivo `.env`:

```env
DB_SSL_CA=/path/to/ca-cert.pem
DB_SSL_CERT=/path/to/client-cert.pem
DB_SSL_KEY=/path/to/client-key.pem
```

## 🌐 Provedores de Banco de Dados

### AWS RDS

```env
DB_HOST=meu-db.xxxxxxxxxx.us-east-1.rds.amazonaws.com
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=admin
DB_PASSWORD=senha_super_secreta
```

### Google Cloud SQL

```env
DB_HOST=/cloudsql/PROJECT_ID:REGION:INSTANCE_NAME
DB_PORT=3306
DB_DATABASE=mydb
DB_USERNAME=root
DB_PASSWORD=senha_super_secreta
```

### DigitalOcean Managed Database

```env
DB_HOST=db-postgresql-nyc1-12345.db.ondigitalocean.com
DB_PORT=3306
DB_DATABASE=defaultdb
DB_USERNAME=doadmin
DB_PASSWORD=senha_do_banco
```

### PlanetScale

```env
DB_HOST=aws.connect.psdb.cloud
DB_PORT=3306
DB_DATABASE=meu_banco
DB_USERNAME=meu_usuario
DB_PASSWORD=senha_pscale
```

## 🔧 Troubleshooting

### Erro: "SQLSTATE[HY000] [2002] No such file or directory"

O Docker não consegue resolver o hostname. Tente:

1. Usar o IP ao invés do hostname
2. Adicionar o hostname ao `/etc/hosts` do container

### Erro: "Access denied for user"

Verifique:

- Usuário e senha estão corretos
- O usuário tem permissão para conectar do IP da VPS
- Firewall permite conexões

### Erro: "Can't connect to MySQL server"

Verifique:

- O banco de dados está acessível pela internet
- A porta 3306 está aberta no firewall
- O host está correto

### Testar Conexão Manualmente

```bash
# Do host da VPS
mysql -h SEU_SERVIDOR -u USUARIO -p

# Do container Docker
docker-compose exec app mysql -h SEU_SERVIDOR -u USUARIO -p
```

## 📊 Monitoramento

### Verificar Conexões Ativas

```bash
docker-compose exec app php artisan db:show
```

### Verificar Status da Conexão

```bash
docker-compose exec app php artisan tinker

# Executar
DB::select('SELECT VERSION()');
```

## ✅ Checklist

- [ ] Arquivo `.env` configurado com credenciais corretas
- [ ] Banco de dados acessível da VPS
- [ ] Firewall configurado para permitir conexões
- [ ] Usuário do banco tem permissões adequadas
- [ ] Teste de conexão bem-sucedido
- [ ] Migrations executadas

## 🔄 Migrar de Banco Local para Externo

Se você estava usando o banco local do Docker e quer migrar:

1. Exportar dados do banco local:

```bash
docker-compose exec db mysqldump -u root -p catchme > backup.sql
```

2. Importar para banco externo:

```bash
mysql -h SEU_SERVIDOR -u USUARIO -p catchme < backup.sql
```

3. Atualizar `.env` com as credenciais do banco externo

4. Reiniciar containers:

```bash
docker-compose down
docker-compose up -d
```

## 💡 Dicas

- Use senhas fortes e únicas
- Configure backup automático do banco externo
- Monitore conexões e performance
- Use SSL quando disponível
- Mantenha o banco atualizado
