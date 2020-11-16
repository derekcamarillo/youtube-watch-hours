<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="text-center">
                    Must play this video for <strong><span id="played">0</span>/{{ $order->seconds }} seconds</strong>
                </div>

                <script src="https://www.youtube.com/iframe_api"></script>
                <iframe id="ytPlayer"
                        frameborder="0"
                        allowfullscreen="1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        title="YouTube video player"
                        width="100%" height="600"
                        src="https://www.youtube.com/embed/{{ $order->video }}?enablejsapi=1&origin={{ env('APP_URL') }}&widgetid=1"></iframe>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var playing = false;
            var fullyPlayed = false;
            var interval = '';
            var played = 0;
            var length = '{{ $order->seconds }}';
            var response = '148';


            var player, playing = false;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('ytPlayer', {
                    width: '95%',
                    videoId: 'xianU0IrxEk',
                    events: {
                        'onStateChange': onYouTubePlayerStateChange
                    }
                });
            }

            function YouTubePlaying() {
                played += 0.1;
                roundedPlayed = Math.ceil(played);
                document.getElementById("played").innerHTML = Math.min(roundedPlayed, length);
                if (roundedPlayed == length) {
                    if (fullyPlayed == false) {
                        YouTubePlayed();
                        fullyPlayed = true
                    }
                }
            }

            function YouTubePlayed() {
                axios.post("{{ route('order.watch') }}", {
                    uid: "{{ $order->uid }}"
                }).then(function (response) {
                    console.log(response);
                    if (response.status) {
                        alert(response.data);
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }

            function onYouTubePlayerReady(a) {
                ytplayer = document.getElementById("myytplayer");
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
</x-app-layout>