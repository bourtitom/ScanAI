<?php
require_once('../funcs.php'); // Assurez-vous que ce fichier contient votre connexion PDO
header('Content-Type: application/json');

// Vérifier si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurer que userId est envoyé avec la requête
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['userId'])) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM crypto_bills WHERE user_id = :userId AND payment_status = 'waiting' ORDER BY expiration_date DESC LIMIT 1");
        $stmt->execute(['userId' => $data['userId']]);
        $payment = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($payment) {
            // Utilisez l'ID de paiement pour interroger l'API NOWPayments et obtenir les détails à jour
            $updatedPaymentDetails = getUpdatedPaymentDetails($payment['payment_id']);
            if ($updatedPaymentDetails !== false) {
                echo json_encode(['success' => true, 'payment' => $updatedPaymentDetails]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Impossible de récupérer les détails de paiement à jour.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Aucun paiement en cours trouvé.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'UserId non fourni.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
}