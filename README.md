Installation

Etape 1 : Télécharger les fichiers dans le dossier racine de votre serveur web (en général "www/") par téléchargement ou via la commande git clone https://github.com/marialalij/php-blog.git
Etape 2 : Créer une base données sur votre SGDB (MySQL) et importer le fichier database/db.sql pour charger les tables du blog.
Etape 3 : Dans le fichier config/dev.php, modifiez les paramètres suivants en fonction de vos accès à votre base de données :
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blogphp');