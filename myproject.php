<?php

// Vérifie si le script est appelé depuis le terminal
if (php_sapi_name() !== 'cli') {
    echo "Ce script doit être exécuté depuis le terminal.\n";
    exit(1);
}

// Récupère les arguments
$args = $argv;
array_shift($args); // Supprime le nom du script

if (empty($args)) {
    echo "Usage : php myproject.php [option] [arguments]\n";
    echo "Options disponibles :\n";
    echo "  --add-description [description]  : Ajouter une description\n";
    echo "  --verify-code                   : Vérifier la qualité du code\n";
    echo "  --send-code                     : Envoyer le code vers Git\n";
    exit(0);
}

// Gestion des options
switch ($args[0]) {
    case '--add-description':
        if (!isset($args[1])) {
            echo "Erreur : Vous devez fournir une description.\n";
            exit(1);
        }
        $description = $args[1];
        echo "Description ajoutée : $description\n";
        // TODO : Ajouter la logique pour enregistrer la description dans la base de données
        break;

    case '--verify-code':
        echo "Vérification du code en cours...\n";
        $output = null;
        $resultCode = null;
        exec('vendor/bin/phpcs --standard=PSR12 src/', $output, $resultCode);
        if ($resultCode === 0) {
            echo "Aucune erreur détectée !\n";
        } else {
            echo "Erreurs détectées :\n" . implode("\n", $output) . "\n";
        }
        break;

    case '--send-code':
        echo "Envoi du code vers le dépôt Git...\n";
        exec('git add . && git commit -m "Commit automatique" && git push', $output, $resultCode);
        if ($resultCode === 0) {
            echo "Code envoyé avec succès !\n";
        } else {
            echo "Erreur lors de l'envoi :\n" . implode("\n", $output) . "\n";
        }
        break;

    default:
        echo "Option inconnue : {$args[0]}\n";
        exit(1);
}

?>
