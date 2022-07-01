@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Success message -->
    <h2>Contactez-nous!</h2>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <form  method="post" action="{{ route('contact.store') }}">
        @csrf
        <div class="form-group">
            <label>Votre nom</label>
            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'error' : '' }}" name="contact_name" id="contact_name">
            <!-- Error -->
            @if ($errors->has('contact_name'))
                <div class="error">
                    {{ $errors->first('contact_name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Votre email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
            @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" class="form-control {{ $errors->has('phone_number') ? 'error' : '' }}" name="phone_number" id="phone_number">
            @if ($errors->has('phone_number'))
                <div class="error">
                    {{ $errors->first('phone_number') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Votre problème</label>
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                   id="subject">
            @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Message</label>
            <input  type="text" class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message">
            @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>
        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
</div>
@endsection
