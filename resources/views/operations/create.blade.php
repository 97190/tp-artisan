@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter une opération </h3>
                            <!-- Message d'information -->
                            @if ($errors->any()) <!--Instruction conditionnelle si il y a des erreurs, exexute le bloc div class =alert -->
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error) <!--Boucle sur toutes les erreurs du formulaire  -->
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('operations.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nature de l'opération</label>
                                    <input type="text" name="nature_operation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date_operation"/>
                                    
                                </div>
                                <div class="form-group">
                                <label class="label">Catégorie</label>
                                    <select name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                <label class="label">Status</label>
                                    <select name="status_id">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                <label class="label">Débit ?</label>
                                    <select name="debit">
                                <option value="0">Crédit</option>
                                <option value="1"></option>
                                        </select>
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
