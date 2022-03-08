@extends('layouts.app')

@section('content')


    <div class="adminContent">
        <div class="container-fluid">
            <div class="adminContent__header">
                <span class="pageTitle">Użytkownicy</span>
                <div class="adminContent__buttons">
                    <a href="{{route('clients.edit')}}"
                       class="buttonPrimary -green"><span>Utwórz konto użytkownika</span></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card__header">
                            <span>Lista użytkowników</span>

                        </div>
                        <div class="card__body">

                            <table id="table" class="display table" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imię</th>
                                    <th>Email</th>
                                    <th>Data utworzenia</th>
                                    <th>Weryfikacja</th>
                                    <th>Status</th>
                                    <th>Zarządzanie</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->created_at}}</td>
                                        <td>
                                            <div class="status -{{($client->email_verified_at ? 'true' : 'false')}}">
                                                @if($client->email_verified_at)
                                                    <i class="mdi mdi-check-circle"></i> <span>zweryfikowany</span>
                                                @else
                                                    <i class="mdi mdi-minus-circle"></i> <span>nie zweryfikowany</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="status -{{($client->status ? 'true' : 'false')}}">
                                                @if($client->status)
                                                    <i class="mdi mdi-check-circle"></i> <span>aktywny</span>
                                                @else
                                                    <i class="mdi mdi-minus-circle"></i> <span>nie aktywny</span>
                                                    @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="controls">
                                                <a href="{{route('clients.edit', $client->id)}}" class="edit"><i class="mdi mdi-pencil"></i> EDYTUJ</a>
                                                <form action="{{route('clients.delete', $client->id)}}" id="delete{{$client->id}}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" id="delete{{$client->id}}" value="Delete">
                                                    <span class="delete" onclick="confirmDelete('delete{{$client->id}}')"><i class="mdi mdi-delete-forever"></i> Usuń</span>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts.body.bottom')
        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>
    @endpush
@endsection
