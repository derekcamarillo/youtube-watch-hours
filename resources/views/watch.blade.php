@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>{{ $order->title }}</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="withdraw-form add-form">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4">
                                <div class="video-block">
                                    <div class="content mb-2" style="position: unset; bottom: unset;">
                                        <div class="row mb-2">
                                            <div class="col-12 text-center">Must play this video for <strong id="played">0</strong>/{{ $order->seconds }} seconds</div>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('watch.list') }}" id="btn-action" class="btn btn-primary">SKIP</a>
                                        </div>
                                    </div>

                                    <div class="full-img">
                                        <script src="https://www.youtube.com/iframe_api"></script>

                                        <iframe id="ytPlayer"
                                                frameborder="0"
                                                allowfullscreen="1"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                title="{{ $order->title }}" width="100%" height="600" src="https://www.youtube.com/embed/{{ $order->video }}?enablejsapi=1&origin=http://localhost:8000&widgetid=1"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var fullyPlayed = false;
        var interval = '';
        var played = 0;
        var length = '{{ $order->seconds }}';
        var response = '148';

        var player, playing = false;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('ytPlayer', {
                width: '95%',
                videoId: '{{ $order->video }}',
                events: {
                    'onStateChange': onYouTubePlayerStateChange
                }
            });
        }

        function YouTubePlaying() {
            played += 0.1;
            roundedPlayed = Math.ceil(played);
            $('#played').text(Math.min(roundedPlayed, length));
            if (roundedPlayed == length) {
                if (fullyPlayed == false) {
                    YouTubePlayed();
                    fullyPlayed = true
                }
            }
        }

        function YouTubePlayed() {
            $('#btn-action').text("WATCH ANOTHER VIDEO");

            $.ajax({
                type: "POST",
                url: "system/gateways/video.php",
                data: "data=" + response + "&token=" + token,
                success: function(a) {
                    $('#status').html(a);
                    $('#countdown').html('<a href="?page=videos" style="font-weight:600;color:red"><b>WATCH ANOTHER VIDEO HERE</b></a>');
                }
            })
        }

        function onYouTubePlayerReady(a) {
            ytplayer = document.getElementById("ytplayer");
            ytplayer.addEventListener("onStateChange", "onYouTubePlayerStateChange")
        }

        function onYouTubePlayerStateChange(a) {
            if (a.data == YT.PlayerState.PLAYING) {
                playing = true;
                interval = window.setInterval("YouTubePlaying()", 100)
            } else {
                if (playing) {
                    window.clearInterval(interval)
                }
                playing = false
            }
        }
    </script>
@endpush