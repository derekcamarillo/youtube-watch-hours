@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>WITHDRAW MONEY</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="lucky-wrapper">
                <div class="block-content">
                    <div class="text-center wheel">
                        <canvas id="canvas" width="600" height="600">
                            Canvas not supported, use another browser.
                        </canvas>
                        <img class="bdr" src="{{ asset('images/wheel_border.png') }}" width="600" height="600">
                        <img class="ctr" src="{{ asset('images/wheel_center.png') }}" width="140" height="140">
                        <img class="tcr" src="{{ asset('images/wheel_ticker.png') }}" width="60" height="74">
                    </div>
                    <div class="btn-wrapper text-center">
                        <p>Total Winnings : 6,280 coins and 57 VIP Days</p>
                        @if(Auth::user()->coin < 40)
                            <a href="javascript:void(0)" class="btn btn-primary">Insufficient Coins</a>
                        @elseif (Auth::user()->spin_at >= \Carbon\Carbon::now()->subDay())
                            <a href="javascript:void(0)" class="btn btn-primary">Availale At {{ Auth::user()->spin_at->addDay() }}</a>
                        @else
                            <a href="javascript:void(0)" onclick="startWheel()" id="btn-wheel" class="btn btn-primary">SPIN NOW</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row black-box">
                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

            </div>

            <div class="text-center pt-4"><p>Do you feel lucky? Click on Spin and find out how much luck you have, by winning an amazing prize. To spin the wheel you have to pay 40 coins</p></div>

        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/wheel.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src='{{ asset('js/wheel/Winwheel.js') }}'></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    <script>
        let theWheel = new Winwheel({
            'responsive'      : true,
            'outerRadius'     : 260,
            'innerRadius'     : 70,
            'textFontSize'    : 40,
            'textOrientation' : 'horizontal',
            'textAlignment'   : 'outer',
            'numSegments'     : 12,
            'segments'        :
                [
                    {'fillStyle' : '#B92722', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '20Coin', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '40Coin ', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '10Coin', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '60Coin', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '20Coin', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '40Coin ', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '10Coin', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '60Coin', 'textFillStyle' : '#000000'},
                ],
            'animation' :
                {
                    'type'     : 'spinToStop',
                    'duration' : 10,
                    'spins'    : 3,
                    'callbackSound'    : playSound,
                    'callbackFinished' : alertPrize,
                    'soundTrigger'     : 'pin'
                },
            'pins' :
                {
                    'number'     : 12,
                    'fillStyle'  : 'silver',
                    'outerRadius': 3,
                    'responsive' : true
                }
        });

        let audio = new Audio("{{ asset('tick.mp3') }}");

        function playSound()
        {
            audio.pause();
            audio.currentTime = 0;

            audio.play();
        }

        function alertPrize(indicatedSegment)
        {
            $('#btn-wheel').remove();

            $.post("{{ route('wheel.prize') }}", {
                _token: "{{ csrf_token() }}",
                prize: indicatedSegment.text,
            }).done(function (response) {
                alert(indicatedSegment.text);
            });
        }

        function startWheel() {
            theWheel.animation.spins = 10;
            theWheel.startAnimation();
        }
    </script>
@endpush