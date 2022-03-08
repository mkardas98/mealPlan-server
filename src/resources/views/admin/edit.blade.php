@extends('layouts.app')

@section('content')
    @php
    $name = ['name' => 'name', 'placeholder'=>'Nazwa użytkownika', 'type' => 'text', 'value' => $admin->name, 'required' => true];
    $username = ['name' => 'username', 'placeholder'=>'Login', 'type' => 'text', 'value' => $admin->username, 'pattern' => '^[-a-zA-Z0-9@\.+_]+$', 'required' => true];
    $email = ['name' => 'email', 'placeholder'=>'E-mail', 'type' => 'email', 'value' => $admin->email, 'required' => true];
    $password = ['name' => 'password', 'placeholder'=>'Nowe hasło', 'type' => 'password', 'value' => '', 'required' => false];
    @endphp

    <div class="adminContent">
    <div class="container-fluid">
       <div class="adminContent__header">
           <span class="pageTitle">konto administratora</span>
       </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">

                    <div class="card__header">
                        <span>Edycja konta</span>
                    </div>

                    <div class="card__body">
                        <form action="{{route('admin.edit')}}" method="POST" id="form">
                            @csrf
                            @include('helpers.form.input', $name)
                            @include('helpers.form.input', $username)
                            @include('helpers.form.input', $email)
                            @include('helpers.form.input', $password)
                            <button type="submit" class="buttonPrimary -green -fullWidth"><span>Zapisz</span></button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>



    </div>
@endsection
