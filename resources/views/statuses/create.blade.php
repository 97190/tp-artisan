@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter un status </h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('statuses.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nom du status</label>
                                    <input type="text" name="status_name" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill m-2">Créer un status</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
