# Installare PHP

La guida completa, con le immagini, è nella dispensa "Installare l'ambiente del corso".
Qui i passi essenziali. Versione del corso: **PHP 8.3**.

## Windows
1. https://windows.php.net/download → PHP 8.3, **VS17 x64 Non Thread Safe**, file **Zip**.
2. Estrai lo zip in `C:\php` (una cartella senza spazi nel percorso).
3. Nella cartella copia `php.ini-development` e rinomina la copia in `php.ini`.
4. Apri `php.ini` con VS Code, cerca e modifica queste righe (togli il `;` iniziale):
   ```ini
   extension_dir = "C:\php\ext"
   extension=curl
   extension=fileinfo
   extension=intl
   extension=mbstring
   extension=openssl
   extension=pdo_mysql
   extension=zip
   date.timezone = Europe/Rome
   ```
5. Aggiungi `C:\php` al PATH. In PowerShell:
   ```powershell
   [Environment]::SetEnvironmentVariable("Path", [Environment]::GetEnvironmentVariable("Path","User") + ";C:\php", "User")
   ```
6. **Chiudi e riapri VS Code**, poi nel terminale: `php -v`.

Se `php -v` dà "Visual C++ Redistributable" o una DLL mancante: installa
"Microsoft Visual C++ Redistributable x64" dal sito Microsoft.

## Mac
1. Installa Homebrew (https://brew.sh), se manca.
2. `brew install php@8.3` e segui le istruzioni finali per aggiungerlo al PATH.
3. `php -v`.

## Estensione di VS Code
**PHP Intelephense** (autore: Ben Mewburn): completamento automatico e segnalazione degli errori.

## Verifica
```bash
php -v          # PHP 8.3.x
php -m          # elenco delle estensioni: devono esserci mbstring e pdo_mysql
```
