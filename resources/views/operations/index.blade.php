@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <p id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des opérations</h3>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                            <a href="{{ route('operations.create') }}" class="btn btn-success btn-sm">Ajouter une opération</a>
                            <!-- Tableau -->
                          <p class="text-center h6 bg-light"> Il y a {{ $nbrOperations }} opérations</p><!-- j'affiche le nombre total d'opérations-->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nature opération</th>
                                    <th scope="col">Date opération</th>
                                    <th scope="col">Débit</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($operations as $operation)
                                    <tr>
                                        <td>{{$operation->id}}</td>
                                        <td>{{$operation->nature_operation}}</td>
                                        <td>{{$operation->date_operation}}</td>


                                        <td>
                                            @if ( $operation->debit == 0) <p class="text-success">Crédit </p>@else<p class="text-danger"> Débit</p> <!--Changemnt de statut avec la classe boostrap si crédit est vrai -->
                                            @endif
                                        </td>
                                        @if ($operation->category)
                                        <td>{{$operation->category->category_name }}</td>
                                        @else
                                        <td>Pas de catégorie</td>
                                        @endif
                                        @if ($operation->status)
                                        <td>{{$operation->status->status_name }}</td>
                                        @else
                                        <td>Pas de statut</td>
                                        @endif
                                        <td>{{ $operation->amount }} €</td>
                                        <td>
                                            <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-primary btn-sm">Editer</a>

                                            <form action="{{ route('operations.destroy',$operation->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer l\opération?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <td><p><strong>Total des opération Crédit :</strong> +{{ $totalCredit }} €</p></td> <!-- ici le total des opération crédit-->
                            <td><p><strong>Total des opération Débit :</strong> -{{ $totalDebit }} € </p></td><!--et la le total des opération débit -->
                            <div>
                        <p class="h4">Total des opérations :</p> <!-- la je vais afficher le total avec une condition comme pour débit/crédit-->
                            <strong>@if ( $total > 0) <p class="text-success m-2"> {{ $total }} €</p>@else<p class="text-danger m-2">{{ $total }} €</strong></p>
                        @endif
                            </div>

                            <!-- Fin du Tableau -->
                            <div class="float-right">
                            <a href="{{ route('statuses.index') }}" class="btn btn-warning">Voir les statuts</a>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voir les categories</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
