@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/lottery.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>WELCOME TO LOTTERY</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="lucky-wrapper">
                <div class="block-content">
                    <div class="text-center wheel">
                        <div>
                            <div class="wrap">
                                <h1>Lottery ends at every <strong>Saturday 23:59:59</strong></h1>

                                <div class="countdown">
                                    <div class="bloc-time days" data-init-value="7">
                                        <span class="count-title">Days</span>

                                        <div class="figure days days-1">
                                            <span class="top">0</span>
                                            <span class="top-back">
                                                <span>0</span>
                                            </span>
                                            <span class="bottom">0</span>
                                            <span class="bottom-back">
                                                <span>0</span>
                                            </span>
                                        </div>

                                        <div class="figure days days-2">
                                            <span class="top">7</span>
                                            <span class="top-back">
                                                <span>7</span>
                                            </span>
                                            <span class="bottom">7</span>
                                            <span class="bottom-back">
                                                <span>7</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bloc-time hours" data-init-value="24">
                                        <span class="count-title">Hours</span>

                                        <div class="figure hours hours-1">
                                            <span class="top">2</span>
                                            <span class="top-back">
                                                <span>2</span>
                                            </span>
                                            <span class="bottom">2</span>
                                            <span class="bottom-back">
                                                <span>2</span>
                                            </span>
                                        </div>

                                        <div class="figure hours hours-2">
                                            <span class="top">4</span>
                                            <span class="top-back">
                                                <span>4</span>
                                            </span>
                                            <span class="bottom">4</span>
                                            <span class="bottom-back">
                                                <span>4</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bloc-time min" data-init-value="0">
                                        <span class="count-title">Minutes</span>

                                        <div class="figure min min-1">
                                            <span class="top">0</span>
                                            <span class="top-back">
                                                <span>0</span>
                                            </span>
                                            <span class="bottom">0</span>
                                            <span class="bottom-back">
                                                <span>0</span>
                                            </span>
                                        </div>

                                        <div class="figure min min-2">
                                            <span class="top">0</span>
                                            <span class="top-back">
                                                <span>0</span>
                                            </span>
                                            <span class="bottom">0</span>
                                            <span class="bottom-back">
                                                <span>0</span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bloc-time sec" data-init-value="0">
                                        <span class="count-title">Seconds</span>

                                        <div class="figure sec sec-1">
                                            <span class="top">0</span>
                                            <span class="top-back">
                                                <span>0</span>
                                            </span>
                                            <span class="bottom">0</span>
                                            <span class="bottom-back">
                                                <span>0</span>
                                            </span>
                                        </div>

                                        <div class="figure sec sec-2">
                                            <span class="top">0</span>
                                            <span class="top-back">
                                                <span>0</span>
                                            </span>
                                            <span class="bottom">0</span>
                                            <span class="bottom-back">
                                                <span>0</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper">
                        <div class="row">
                            <div class="col-md-4 align-self-center text-center">Lottery Prize<strong>{{ Auth::user()->lotteries()->count() * 10 }} Coins</strong></div>
                            <div class="col-md-4 text-center align-self-center">
                                @if(Auth::user()->coin < 10)
                                    <button class="btn btn-primary">Insufficient Coin</button>
                                @else
                                    <form action="{{ route('lottery') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">BUY NOW</button>
                                    </form>
                                @endif
                            </div>
                            <div class="col-md-4 align-self-center text-center">Sold Tickets<strong>{{ \App\Models\Lottery::count() }} tickets</strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="number-block">
                <div class="row">
                    @foreach(Auth::user()->lotteries as $lottery)
                        <div class="col-md-3 mb-4"><span>{{ $lottery->ticket }}</span></div>
                    @endforeach
                </div>
            </div>

            <div class="row black-box">
                @foreach($wins as $win)
                    <div class="col-lg-4 mb-4">
                        <div class="box">
                            <div class="media mb-4"><span class="media-body">{{ $win->user->name }}</span><a href="#" class="btn btn-primary">100 coins</a></div>
                            <div class="text-center mt-3">{{ $win->deleted_at }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center pt-4"><p>To join the lottery, purchase tickets by click on Buy a Ticket. With every purchased ticket you have an extra chance to win the lottery and also the lottery award is increased. There is a lottery every week and is ended at every Saturday, at 23:59. If you win the lottery, you will receive your prize instantly after the end of the round. Every lottery ticket costs 10.00 coins.</p></div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    <script>
        // Create Countdown
        var Countdown = {

            // Backbone-like structure
            $el: $('.countdown'),

            // Params
            countdown_interval: null,
            total_seconds     : 0,

            // Initialize the countdown
            init: function() {

                // DOM
                this.$ = {
                    days  : this.$el.find('.bloc-time.days .figure'),
                    hours  : this.$el.find('.bloc-time.hours .figure'),
                    minutes: this.$el.find('.bloc-time.min .figure'),
                    seconds: this.$el.find('.bloc-time.sec .figure')
                };

                // Init countdown values
                this.values = {
                    days  : this.$.days.parent().attr('data-init-value'),
                    hours  : this.$.hours.parent().attr('data-init-value'),
                    minutes: this.$.minutes.parent().attr('data-init-value'),
                    seconds: this.$.seconds.parent().attr('data-init-value'),
                };

                // Initialize total seconds
                this.total_seconds = this.values.hours * 60 * 60 * 24 + this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;

                // Animate countdown to the end
                this.count();
            },

            count: function() {

                var that    = this,
                    $day_1 = this.$.days.eq(0),
                    $day_2 = this.$.days.eq(1),
                    $hour_1 = this.$.hours.eq(0),
                    $hour_2 = this.$.hours.eq(1),
                    $min_1  = this.$.minutes.eq(0),
                    $min_2  = this.$.minutes.eq(1),
                    $sec_1  = this.$.seconds.eq(0),
                    $sec_2  = this.$.seconds.eq(1);

                this.countdown_interval = setInterval(function() {

                    if(that.total_seconds > 0) {

                        --that.values.seconds;

                        if(that.values.minutes >= 0 && that.values.seconds < 0) {

                            that.values.seconds = 59;
                            --that.values.minutes;
                        }

                        if(that.values.hours >= 0 && that.values.minutes < 0) {

                            that.values.minutes = 59;
                            --that.values.hours;
                        }

                        // Update DOM values
                        // Hours
                        that.checkHour(that.values.hours, $hour_1, $hour_2);

                        // Minutes
                        that.checkHour(that.values.minutes, $min_1, $min_2);

                        // Seconds
                        that.checkHour(that.values.seconds, $sec_1, $sec_2);

                        --that.total_seconds;
                    }
                    else {
                        clearInterval(that.countdown_interval);
                    }
                }, 1000);
            },

            animateFigure: function($el, value) {

                var that         = this,
                    $top         = $el.find('.top'),
                    $bottom      = $el.find('.bottom'),
                    $back_top    = $el.find('.top-back'),
                    $back_bottom = $el.find('.bottom-back');

                // Before we begin, change the back value
                $back_top.find('span').html(value);

                // Also change the back bottom value
                $back_bottom.find('span').html(value);

                // Then animate
                TweenMax.to($top, 0.8, {
                    rotationX           : '-180deg',
                    transformPerspective: 300,
                    ease                : Quart.easeOut,
                    onComplete          : function() {

                        $top.html(value);

                        $bottom.html(value);

                        TweenMax.set($top, { rotationX: 0 });
                    }
                });

                TweenMax.to($back_top, 0.8, {
                    rotationX           : 0,
                    transformPerspective: 300,
                    ease                : Quart.easeOut,
                    clearProps          : 'all'
                });
            },

            checkHour: function(value, $el_1, $el_2) {

                var val_1       = value.toString().charAt(0),
                    val_2       = value.toString().charAt(1),
                    fig_1_value = $el_1.find('.top').html(),
                    fig_2_value = $el_2.find('.top').html();

                if(value >= 10) {

                    // Animate only if the figure has changed
                    if(fig_1_value !== val_1) this.animateFigure($el_1, val_1);
                    if(fig_2_value !== val_2) this.animateFigure($el_2, val_2);
                }
                else {

                    // If we are under 10, replace first figure with 0
                    if(fig_1_value !== '0') this.animateFigure($el_1, 0);
                    if(fig_2_value !== val_1) this.animateFigure($el_2, val_1);
                }
            }
        };

        // Let's go !
        Countdown.init();
    </script>
@endpush