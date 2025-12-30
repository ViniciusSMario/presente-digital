# Configuração de Upload - Presente Digital

## Problema
O upload de múltiplas mídias falha com erro `POST Content-Length exceeds the limit` quando o tamanho total ultrapassa ~40MB.

## Soluções Implementadas

### 1. Validação Client-Side (✅ Completo)
- **Limite por arquivo**: 10MB
- **Limite total**: 50MB
- **Limite de arquivos**: 10 arquivos
- Validação em tempo real com feedback visual
- Bloqueio do botão "Continuar" se o tamanho total exceder 50MB

### 2. Configuração PHP (⚠️ Requer Ação Manual)

#### Opção A: Editar php.ini (Recomendado)
Abra o arquivo `C:\xampp\php\php.ini` e atualize:

```ini
upload_max_filesize = 60M
post_max_size = 60M
max_execution_time = 300
memory_limit = 256M
```

Depois **reinicie o Apache/servidor PHP**.

#### Opção B: .user.ini (Já criado)
Um arquivo `.user.ini` foi criado em `public/.user.ini` com as configurações.
- Funciona apenas em servidores CGI/FastCGI
- Pode não funcionar no XAMPP/Apache com mod_php

#### Opção C: .htaccess (Alternativa)
Se estiver usando Apache com mod_php, adicione ao `public/.htaccess`:

```apache
php_value upload_max_filesize 60M
php_value post_max_size 60M
php_value max_execution_time 300
php_value memory_limit 256M
```

### 3. Verificar Configuração Atual

```bash
php -r "echo ini_get('upload_max_filesize') . PHP_EOL;"
php -r "echo ini_get('post_max_size') . PHP_EOL;"
```

### 4. Reiniciar Servidor

```bash
# Se estiver usando XAMPP
# Reinicie o Apache pelo painel de controle do XAMPP

# Se estiver usando Laravel Sail/Docker
sail down && sail up -d

# Se estiver usando php artisan serve
# Ctrl+C e execute novamente: php artisan serve
```

## Recomendações Adicionais

### Backend Validation (Opcional)
Adicionar validação no controller Laravel em `app/Http/Controllers/GiftController.php`:

```php
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'message' => 'required|string',
        'template' => 'required|string',
        'media.*' => 'file|max:10240', // 10MB per file
    ]);
    
    // Additional check for total size
    $totalSize = 0;
    foreach ($request->file('media', []) as $file) {
        $totalSize += $file->getSize();
    }
    
    if ($totalSize > 50 * 1024 * 1024) { // 50MB
        return response()->json([
            'message' => 'O tamanho total dos arquivos excede 50MB.'
        ], 422);
    }
    
    // ... resto do código
}
```

## Testes

1. Tente adicionar 10 arquivos de ~5MB cada (50MB total) - deve funcionar
2. Tente adicionar um arquivo > 10MB - deve mostrar erro
3. Tente adicionar arquivos que totalizam > 50MB - deve bloquear "Continuar"

## Status
- ✅ Client-side validation implementada
- ⚠️ PHP configuration requer atualização manual
- ⏳ Backend validation (opcional)
