<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Nouvelle opération</h2>
    <p>Une nouvelle opération à été créer :</p>
    <ul>
      <li><strong>Nature de l'operation</strong> : {{ $nature_operation }}</li>
      <li><strong>Date opération</strong> : {{ $date_operation }}</li>
      <li><strong>débit?</strong> :
          @if($debit == 0)
              Crédit
         @else
              Débit
          @endif
      </li>
      <li><strong>Catégorie</strong> : {{ $category }}</li>
      <li><strong>Statut</strong> : {{ $status }}</li>
      <li><strong>Montant</strong> : {{ $amount }} €</li>
    </ul>
  </body>
</html>
