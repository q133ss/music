@extends('layouts.lk')
@section('title', 'Обратная связь')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Связаться с нами</h5>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('lk.feedback.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Тема</label>
                    <input type="text" name="theme" class="form-control" id="basic-default-fullname" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Сообщение</label>
                    <textarea id="basic-default-message" name="message" class="form-control" placeholder=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Отправить</button>
            </form>
        </div>
    </div>

    <div class="row text-center justify-content-center gap-sm-0 gap-3">
        <div class="col-sm-6">
            <div class=" rounded bg-faq-section text-center">
                <h4 class="mb-2"><a class="text-body" href="tel:+7(999)9999999">+7 (999) 999-99-99</a></h4>
                <p>Круглосуточно</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class=" rounded bg-faq-section text-center">
                <h4 class="mb-2"><a class="text-body" href="mailto:info@site.com">info@site.com</a></h4>
                <p>Наш email</p>
            </div>
        </div>
    </div>
@endsection
