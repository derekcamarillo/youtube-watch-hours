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
                        <a href="javascript:void(0)" onclick="startWheel()" class="btn btn-primary">SPIN NOW</a>
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
    <style>
        .wheel .bdr {
            position: absolute;
            left: 50%;
            margin-left: -300px;
        }
        .wheel .ctr {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -162px;
            margin-left: -70px;
        }
        .wheel .tcr {
            position: absolute;
            left: 50%;
            margin-left: -30px;
            margin-top: -10px;
        }
    </style>
@endpush

@push('scripts')
    <script src='{{ asset('js/wheel/Winwheel.js') }}'></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    <script>
        let theWheel = new Winwheel({
            'responsive'      : true,
            'outerRadius'     : 260, // Set outer radius so wheel fits inside the background.
            'innerRadius'     : 70,         // Make wheel hollow so segments dont go all way to center.
            'textFontSize'    : 40,         // Set default font size for the segments.
            'textOrientation' : 'horizontal', // Make text vertial so goes down from the outside of wheel.
            'textAlignment'   : 'outer',    // Align text to outside of wheel.
            'numSegments'     : 12,         // Specify number of segments.
            'segments'        :             // Define segments including colour and text.
                [                               // font size and text colour overridden on backrupt segments.
                    {'fillStyle' : '#B92722', 'text' : '30Coin', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '2 VIP', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '10$ ', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : 'Lost', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '450', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '30Coin', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '2 VIP', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : '10$ ', 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : 'Lost', 'textFillStyle' : '#000000'},
                    {'fillStyle' : '#B92722', 'text' : 'Bankrupt', 'textFontSize' : 36, 'textFillStyle' : '#ffffff'},
                    {'fillStyle' : '#ffffff', 'text' : '450', 'textFillStyle' : '#000000'},
                ],
            'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 10,
                    'spins'    : 3,
                    'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
                    'callbackFinished' : alertPrize,  // Function to call whent the spinning has stopped.
                    'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound.
                },
            'pins' :                // Turn pins on.
                {
                    'number'     : 12,
                    'fillStyle'  : 'silver',
                    'outerRadius': 3,
                    'responsive' : true
                }
        });

        // Loads the tick audio sound in to an audio object.
        let audio = new Audio("{{ asset('tick.mp3') }}");

        // This function is called when the sound is to be played.
        function playSound()
        {
            // Stop and rewind the sound if it already happens to be playing.
            audio.pause();
            audio.currentTime = 0;

            // Play the sound.
            audio.play();
        }

        // Called when the animation has finished.
        function alertPrize(indicatedSegment)
        {
            // Display different message if win/lose/backrupt.
            if (indicatedSegment.text == 'LOOSE TURN') {
                alert('Sorry but you loose a turn.');
            } else if (indicatedSegment.text == 'BANKRUPT') {
                alert('Oh no, you have gone BANKRUPT!');
            } else {
                alert("You have won " + indicatedSegment.text);
            }
        }

        function startWheel() {
            theWheel.animation.spins = 10;
            theWheel.startAnimation();
        }
    </script>
@endpush