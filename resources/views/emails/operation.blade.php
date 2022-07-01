<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Nouvelle opération</h2>
    <p>Une nouvelle opération à été créer :</p>
    <ul>
      <li><strong>Nature de l'operation</strong> : {{ $operation->nature_operation }}</li>
      <li><strong>Date opération</strong> : {{ $operation['date_operation'] }}</li>
      <li><strong>débit?</strong> : {{ $operation['debit'] }}</li>
      <li><strong>Categorie</strong> : {{ $operation['category_id'] }}</li>
      <li><strong>Statut</strong> : {{ $operation['status_id'] }}</li>
      <li><strong>Montant</strong> : {{ $operation['amount'] }}</li>
    </ul>
  </body>
</html> 