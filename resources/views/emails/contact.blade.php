<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Nouvelle demande de contact</h2>
<p>Vous avez un nouveau message</p>
<ul>
    <li><strong>Nom du client</strong> : {{ $contact_name }}</li>
    <li><strong>Email</strong> : {{ $email }}</li>
    <li><strong>Numéro de téléphone</strong> : {{ $phone_number }}</li>
    <li><strong>Le problème</strong> : {{ $subject }}</li>
    <li><strong>Message</strong> : {{ $content }} </li>
</ul>
</body>
</html>
