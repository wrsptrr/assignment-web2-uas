@extends('layout.app')
@section('title', 'Purchase History')
@section('content')
<div class="container py-5">
    <table class="table table-hover text-uppercase">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Bill</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-secondary">
        @foreach($purchase as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->payment }}</td>
                <td class="text-capitalize">Rp. {{ number_format($data->total) }}</td>
                <td class="text-center text-nowrap">
                    <a href="/history/detail/{{$data->id}}" class="btn btn-main"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection