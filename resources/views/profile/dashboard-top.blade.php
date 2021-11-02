<div class="dash-board-top">
    <div class="user-info">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="media">
                    <div class="avatar"><img src="{{ asset('images/user.svg') }}" alt=""></div>
                    <div class="media-body">
                        <h5>{{ Auth::user()->name }}</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">EDIT ACCOUNT</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="row">
                    <div class="col-sm-6"><div class="coin box">COINS<br>{{ Auth::user()->coin }} = ${{ Auth::user()->coin / 100 * 0.03 }}</div></div>
                    <div class="col-sm-6"><div class="membership box">MEMBERSHIP<br>BASIC</div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="button-link">
        <ul>
            <li><a href="{{ route('withdraw') }}">WITHDRAW MONEY</a></li>
            <li><a href="{{ route('referral') }}">REFERRALS</a></li>
            <li><a href="{{ route('watch.list') }}">WATCH VIDEOS</a></li>
            <li><a href="{{ route('lottery') }}">LOTTERY</a></li>
            <li><a href="{{ route('wheel') }}">LUCKY WHEEL</a></li>
        </ul>
    </div>
</div>
