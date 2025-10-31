<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

// Ce fichier est le point d’entrée de mon application Symfony côté HTTP.
// C’est lui qui est appelé à chaque requête web (ex : quand un utilisateur visite mon site).
// Il joue un rôle similaire à index.js ou app.js dans Express : il démarre le framework et initialise le noyau (Kernel).
// Symfony utilise autoload_runtime.php pour gérer automatiquement l’environnement (dev, prod, etc.) et les options de debug.
// Ensuite, il crée une instance du Kernel avec les bonnes variables d’environnement, et Symfony prend le relais pour router la requête.