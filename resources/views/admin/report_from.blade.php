@extends('layouts.dashboard')
@section('report')
    active
@endsection

@section('title')
    Report
@endsection
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('home')}}">Home Page</a>
        <a class="breadcrumb-item" href="{{route('report')}}">Report</a>
        <a class="breadcrumb-item" href="{{route('report')}}">Searched Report</a>
    </nav>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
@isset($data)


            <div class="card">
                <div class="card-header">
                    <span class="lead">Report (From:{{$start}} to : {{ substr($end, 0, -9)
                    }})</span>

                </div>
                <div class="card-body">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">Sl No:</th>
                                    <th scope="col">User ID:</th>
                                    <th scope="col">Transaction ID:</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone no</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Order Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index=> $d)
                                <tr>
                                    <td>{{ $loop->index +1}}</td>
                                    <td>{{ $d->user_id }}</td>
                                    <td>{{ $d->transaction_id }}</td>
                                    <td>{{ $d->full_name }}</td>
                                    <td>{{ $d->email_address}}</td>
                                    <td>{{ $d->phone_number }}</td>
                                    <td>{{ $d->address }}</td>
                                    @if ($d->payment_method==1)
                                    <td>
                                        <span class="badge badge-light">Cash on delivery</span>
                                    </td>
                                    @elseif($d->payment_method==2)
                                    <td>
                                        <span class="badge badge-primary">Online</span>
                                    </td>
                                    @elseif($d->payment_method==3)
                                    <td>
                                        <span class="badge badge-primary">SSLCommerz</span>
                                    </td>
                                    @endif
                                    <td>{{ $d->amount }}</td>

                                    @if ($d->payment_method==3)
                                    <td>
                                        <span class="badge badge-warning">processing</span>
                                    </td>
                                    @endif
                                    <td class="badge badge-light">{{ $d->created_at }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center text-danger">No Data Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endisset

@endsection
