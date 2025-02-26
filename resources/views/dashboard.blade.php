@include('layouts.navbar')

@include('layouts.Sidebar')


@yield('auctions')
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-eye"></i>
                            <h5><a href="{{ route('auction.index') }}">عرض المزادات</a></h5>
                        </div>
                    </div>
                </div>


            </div>

@include('layouts.footer')
