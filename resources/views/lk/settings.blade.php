@extends('layouts.lk')
@section('title', 'Настройки')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Настройки профиля</h4>
        </div>
        <div class="card-body py-2 my-25">
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
            <!-- form -->
            <form class="validate-form" action="{{route('lk.settings.update')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountFirstName">Имя</label>
                        <input type="text" class="form-control" id="accountFirstName" name="name" placeholder="Имя" value="{{old('name') != null ? old('name') : $user->name}}" data-msg="Please enter first name" />
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="accountLastName">Email</label>
                        <input type="email" class="form-control" id="accountEmail" name="email" placeholder="Email" value="{{old('email') != null ? old('email') :$user->email}}" />
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="oldPwd">Старый пароль</label>
                        <input type="password" class="form-control" id="oldPwd" name="old_password" placeholder="********" value="" />
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="newPwd">Новый пароль</label>
                        <input type="password" class="form-control" id="newPwd" name="new_password" placeholder="********" value="" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-1 me-1">Сохранить</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
