





Para crear un .pptx el servidor tiene que tener habilitado el zip

Documentation: https://phppowerpoint.readthedocs.io/en/latest/intro.html

# para habilitar ZipArchive

## En linux
```bash
sudo apt-get update
sudo apt-get install php-zip
```

Despues se debe de reiniciar el servidor 

```bash
sudo service apache2 restart
# o si usas php-fpm:
sudo service php8.1-fpm restart
```

## En Windows (XAMPP/WAMP)

Abriri php.ini y descomentar la linea ;extension=zip

```bash
extension=zip
```

## Verificar si está habilitado

```bash
php -m | grep zip
```