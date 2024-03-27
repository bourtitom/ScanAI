<?php

require_once('../funcs.php');

header('Content-Type: application/json');

// Récupérer le corps de la requête JSON
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data['amount'])) {
    $amount = $data['amount'];
    $userId = 1; // Exemple d'ID utilisateur, ajustez selon votre logique d'application

    // Ici, implémentez votre logique pour vérifier si l'utilisateur a suffisamment de jetons, etc.
    if (removeToken($amount, $userId) === true) {
        $transaction = createCryptoBill($userId, $amount);
        if ($transaction !== false) {
            echo json_encode($transaction);
        } else {
            echo json_encode(['success' => false, 'error' => 'Impossible de créer la transaction']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors du retrait de jetons']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Requête invalide']);
}
