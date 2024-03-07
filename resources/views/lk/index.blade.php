@extends('layouts.lk')
@section('title', 'Моя музыка')
@section('meta')
    <style>
        .my_beats{
            display: grid;
            grid-row-gap: 20px;
        }

        .beat_wrap{
            display: flex;
            width: 100%;
            align-items: center;
            gap: 10px;
        }

        .beat_ctrl{
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F132311A;
            padding: 7px 7px 7px 10px;
            border-radius: 100%;
        }

        .beat_play{
            width: 80%;
        }

        .hide{
            display: none!important;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Моя музыка</h5>
        </div>
        <div class="card-body">

    <div class="my_beats">
        @foreach($beats as $beat)
        <div class="beat_wrap">
            <audio id="player5" src="/mp3.mp3" preload="none" type="audio/mp3" class="hide"></audio>

            <div class="beat_ctrl">
                <svg onclick="audioPlay(5)" id="beat_ctrl_5" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.28139 0H1.97403L2.56277 0.175781L3.22078 0.527344L3.80952 0.878906L4.77922 1.44141L5.74892 2.00391L6.58009 2.49609L7.44589 2.98828L8.27706 3.48047L9.24675 4.04297L10.2164 4.60547L11.1169 5.13281L12.0866 5.69531L13.0563 6.25781L13.8874 6.75L14.7532 7.24219L15.1688 7.52344L15.5844 7.91016L15.8268 8.26172L15.9654 8.61328L16 8.75391V9.24609L15.8615 9.66797L15.619 10.0547L15.3074 10.3711L14.961 10.6172L14.3723 10.9688L13.4026 11.5312L12.5022 12.0586L11.5325 12.6211L10.5628 13.1836L9.7316 13.6758L8.8658 14.168L8.03463 14.6602L7.06494 15.2227L6.09524 15.7852L5.19481 16.3125L4.22511 16.875L3.25541 17.4375L2.7013 17.7539L2.14719 17.9648L1.97403 18H1.28139L0.900433 17.8594L0.588745 17.6484L0.34632 17.3672L0.17316 17.0156L0.034632 16.5586L0 16.3125V1.6875L0.103896 1.16016L0.242424 0.84375L0.450216 0.492188L0.761905 0.210938L1.14286 0.0351562L1.28139 0Z" fill="#FF1918"/>
                </svg>
            </div>

            <div class="beat_play">
                <div class="beat_name">{{$beat->author->name}} – {{$beat->name}}</div>
                <div class="progress"></div>
            </div>

            <a href="#" class="btn btn-primary">Скачать</a>
        </div>
        @endforeach
    </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function audioPlay(id){
            const ctrl = $('#beat_ctrl_'+id);

            document.getElementById('player'+id).play();
            ctrl.attr('onclick', 'audioPause('+id+')');
            ctrl.html(
                '<path d="M5.66667 5.66667H17.3333V17.3333L17 17.5H6L5.66667 17.3333V5.66667Z" fill="#999999"/>' +
                '<path d="M9.33333 0H13.5L15.8333 0.666667L17.8333 1.66667L20 3.5L20.1667 4H20.5L21.6667 5.66667L22.5 7.66667L23 9.5V13.6667L22.1667 16.3333L21 18.3333L19.5 20L18.1667 21.1667L15.5 22.5L13.6667 23H9.5L7.16667 22.3333L5.16667 21.3333L3 19.5L2.83333 19H2.5L1.33333 17.3333L0.5 15.3333L0 13.5V9.33333L0.833333 6.66667L2 4.66667L3.5 3L4.83333 1.83333L7.5 0.5L9.33333 0ZM10.8333 1L8.83333 1.33333L6.66667 2.16667L5.16667 3.16667L3.5 4.66667L2 7L1.16667 9.5L1 12.1667L1.33333 14.1667L2.16667 16.3333L3.16667 17.8333L4.66667 19.5L7 21L9.5 21.8333L12.1667 22L14.1667 21.6667L16.3333 20.8333L18.1667 19.6667L19.5 18.3333L21 16L21.8333 13.5L22 10.8333L21.6667 8.83333L20.8333 6.66667L19.6667 4.83333L18.3333 3.5L16 2L13.5 1.16667L10.8333 1Z" fill="#999999"/>'
            );
        }

        function audioPause(id){
            let ctrl = $('#beat_ctrl_'+id);
            ctrl.attr('onclick', 'audioPlay('+id+')');

            document.getElementById('player'+id).pause();
            $('#beat_ctrl_'+id).html(
                '<path d="M1.28139 0H1.97403L2.56277 0.175781L3.22078 0.527344L3.80952 0.878906L4.77922 1.44141L5.74892 2.00391L6.58009 2.49609L7.44589 2.98828L8.27706 3.48047L9.24675 4.04297L10.2164 4.60547L11.1169 5.13281L12.0866 5.69531L13.0563 6.25781L13.8874 6.75L14.7532 7.24219L15.1688 7.52344L15.5844 7.91016L15.8268 8.26172L15.9654 8.61328L16 8.75391V9.24609L15.8615 9.66797L15.619 10.0547L15.3074 10.3711L14.961 10.6172L14.3723 10.9688L13.4026 11.5312L12.5022 12.0586L11.5325 12.6211L10.5628 13.1836L9.7316 13.6758L8.8658 14.168L8.03463 14.6602L7.06494 15.2227L6.09524 15.7852L5.19481 16.3125L4.22511 16.875L3.25541 17.4375L2.7013 17.7539L2.14719 17.9648L1.97403 18H1.28139L0.900433 17.8594L0.588745 17.6484L0.34632 17.3672L0.17316 17.0156L0.034632 16.5586L0 16.3125V1.6875L0.103896 1.16016L0.242424 0.84375L0.450216 0.492188L0.761905 0.210938L1.14286 0.0351562L1.28139 0Z" fill="#FF1918"/>'
            );
        }
    </script>
@endsection
