@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Orders</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Your Orders</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">#</th>
                                    <th>Order ID</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>€{{ number_format($order->total, 2) }}</td>
                                    <td>
                                        @if($order->status == 0)
                                        <span class="badge bg-secondary-subtle text-secondary"><i class="fa-solid fa-spinner"></i> Processing</span>
                                        @elseif($order->status == 1)
                                        <span class="badge bg-info"><i class="fa-solid fa-truck-fast"></i> In Transit</span>
                                        @elseif($order->status == 2)
                                        <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i> Delivered</span>
                                        @elseif($order->status == 3)
                                        <span class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                        $datetime = \Carbon\Carbon::createFromDate($order->created_at);
                                        echo $datetime->format('d/m/y');
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Order Actions">
                                            <a class="btn btn-dark btn-sm rounded" target="_blank" href="{{route('show.order', $order->order_number)}}">
                                                <i class="fa fa-eye"> </i> View Order
                                            </a>
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
<script>
    new DataTable('#zero-config');
</script>
@endsection