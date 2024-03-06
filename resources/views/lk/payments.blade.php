@extends('layouts.lk')
@section('title', 'Платежи')
@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Список платежей</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Бит</th>
                            <th>Цена</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->beat->author->name}} - {{$payment->beat->name}}</td>
                            <td>{{$payment->price}}</td>
                            <td class="{{$payment->getStatus()['class']}}">{{$payment->getStatus()['text']}}</td>
                            <td>{{$payment->created_at ? $payment->created_at->format('d.m.Y H:i') : ''}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{$payments->links('lk.pagination.payments')}}
            </div>
        </div>
    </div>
@endsection
