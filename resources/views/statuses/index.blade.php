@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des status</h3>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                            <a href="{{ route('statuses.create') }}" class="btn btn-success btn-sm">Ajouter un status</a>
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statuses as $status)
                                    <tr>
                                        <td>{{$status->id}}</td>
                                        <td>{{$status->status_name}}</td>
                                        <td>
                                            <a href="{{ route('statuses.edit', $status->id) }}" class="btn btn-primary btn-sm">Editer</a>

                                            <form action="{{ route('statuses.destroy',$status->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer le status?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                            <a href="{{ route('operations.index') }}" class="btn btn-warning">Voir les opérations</a>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voir les categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
