@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Numero di Matricola</th>
            <th>Data di Iscrizione</th>
            <th>e-mail</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->surname}}}</td>
                <td>{{$student->registration_number}}</td>
                <td>{{$student->enrolment_date}}</td>
                <td>{{$student->email}}</td>
            </tr>
        @endforeach
    </table>
@endsection
