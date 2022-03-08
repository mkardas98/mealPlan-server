@extends('layouts.app')

@section('content')
    @php
        $name = ['name' => 'name', 'placeholder'=>'Nazwa użytkownika', 'type' => 'text', 'value' => $client->name, 'required' => true];
        $email = ['name' => 'email', 'placeholder'=>'E-mail', 'type' => 'email', 'value' => $client->email, 'required' => true];
        $password = ['name' => 'password', 'placeholder'=>'Hasło', 'type' => 'password', 'value' => '', 'required' => false];

        $status = ['name' => 'status', 'label' => 'Status', 'checked' => $client->status];
    @endphp

    <div class="adminContent">
        <div class="container-fluid">
            <div class="adminContent__header">
                <span class="pageTitle">Użytkownik</span>
                <a class="buttonPrimary -red" href="{{route(str_replace('.edit', '',Route::currentRouteName()).'.index')}}"><span>Powrót</span></a>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">

                        <div class="card__header">
                            <span>{{$client->id ? 'Edycja' : 'Tworzenie'}} użytkownika</span>
                        </div>


                        <div class="card__body">
                            <form action="{{route('clients.edit', $client->id)}}" method="POST" id="form">
                                @csrf
                                @include('helpers.form.input', $name)
                                @include('helpers.form.input', $email)
                                @include('helpers.form.input', $password)
                                @include('helpers.form.checkbox', $status)
                                <button type="submit" class="buttonPrimary -green -fullWidth"><span>Zapisz</span></button>

                            </form>
                        </div>

                    </div>
                </div>
                @if($client->id)
                    <div class="col-lg-4">
                        <div class="card">

                            <div class="card__header">
                                <span>Weryfikacja adresu e-mail</span>
                            </div>

                            <div class="card__body">
                                @if(!$client->email_verified_at)
                                    <p class="card__text --pink">
                                        Użytkownik nie ma zweryfikowanego adresu e-mail
                                    </p>
                                    <a class="buttonPrimary -blue -fullWidth" href="{{route('clients.verification', $client->id)}}"><span>Zweryfikuj</span></a>
                                @else
                                    <p class="card__text --green">
                                        ZWERYFIKOWANY: {{$client->email_verified_at}}
                                    </p>
                                @endif

                            </div>

                        </div>
                    </div>
                    @endif
            </div>

        </div>



    </div>
@endsection
