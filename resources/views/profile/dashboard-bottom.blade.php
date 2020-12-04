<div class="dash-board-bottom">
    <div class="user-info">
        <div class="media">
            <div class="avatar"><img src="{{ asset('images/user.svg') }}" alt=""></div>
            <div class="media-body">
                <div class="row">
                    <div class="col-md-3">COINS<strong>{{ Auth::user()->coin }} = ${{ Auth::user()->coin / 100 * 0.03 }}</strong></div>
                    <div class="col-md-3">Completed Offers<strong>0</strong></div>
                    <div class="col-md-3">Offers Revenue<strong>0 coins</strong></div>
                    <div class="col-md-3">Membership<strong>Basic</strong></div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-info">
        <div class="mb-4">
            <p>Invite your friends and get more coins!</p>
            <p>Invite your friends using your special affiliate URL and receive 10% of their earnings for life!</p>
        </div>
        <div class="link-text">{{ route('register', ['ref' => Auth::user()->ref_code] ) }}</div>
    </div>
</div