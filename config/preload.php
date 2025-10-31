<?php

if (file_exists(dirname(__DIR__) . '/var/cache/prod/App_KernelProdContainer.preload.php')) {
    require dirname(__DIR__) . '/var/cache/prod/App_KernelProdContainer.preload.php';
}
// Ce fichier est utilisé en production pour améliorer les performances.
// Il vérifie si le fichier de préchargement généré par Symfony existe, et le charge si c’est le cas.
// Ce fichier contient une liste de classes à précharger pour accélérer le démarrage de l’application.
// Je n’ai pas besoin de le modifier, Symfony le gère automatiquement quand je compile le cache en prod.
