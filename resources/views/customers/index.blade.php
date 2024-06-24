@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Pelanggan</h2>
                </divs>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Buat Pelanggan baru</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>address</th>
                <th width="280px">Action</th>
            </tr>
            @php $i = 0; @endphp
            @foreach ($customers as $customer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Lihat</a>

                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection