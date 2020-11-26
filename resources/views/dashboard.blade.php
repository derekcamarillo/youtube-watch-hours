@extends('layouts.main')

@section('content')
    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>DASHBOARD</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')
            @include('profile.dashboard-bottom')

            <div class="accordion faq-list" id="faq">
                <div class="card">
                    <div class="card-header" id="heading-1"><a class="btn" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Cheat hours of YouTube views</a></div>
                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#faq">
                        <div class="card-body">
                            <p>Here you can wind up hours of YouTube views to enable monetization on YouTube. The channel should have only 4,000 hours of views, 1,000 subscribers, and 10,000 views. You can increase the hours of views, and the required number of subscribers and views on the links indicated above. Please keep in mind that everything is stable and fast. Execution starts automatically immediately after payment. The larger the quantity and the higher the quality, the quicker the execution speed.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="heading-2"><a class="btn" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Collapsible Group Item #2</a></div>
                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#faq">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection