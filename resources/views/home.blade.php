@extends('layout')
@section('content')


<div class="container mt-4">
    <div class="">
        <h2>Purchase Order</h2>
    </div>
    <div class="proc-items-table table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ORDER NO</th>
                    <th scope="col" class="text-center">ORDER DATE</th>
                    <th scope="col" class="text-center">SUPPLIER</th>
                    <th scope="col" class="text-center">ITEM TOTAL</th>
                    <th scope="col" class="text-center">DISCOUNT</th>
                    <th scope="col" class="text-center">NET AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                @if(count($orders) > 0)
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row" class="text-center">{{ $order->order_no }}</th>
                            <td class="text-center">{{ $order->order_date }}</td>
                            <td class="text-center">supplier</td>
                            <td class="text-center">{{ $order->item_total }}</td>
                            <td class="text-center">{{ $order->discount }}</td>
                            <td class="text-center">{{ $order->net_amt }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr colspan="6">No Purchase Orders Found</tr>
                @endif
            </tbody>
        </table>
    </div>
</div>




@endsection