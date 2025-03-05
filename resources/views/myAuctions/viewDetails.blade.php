@include('layouts.navbar')
@include('layouts.Sidebar')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
@session('success')
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endsession
@session('error')
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endsession
<div class="container">
    <h1 class="display-5 fw-bold mb-4">{{ $auction->title }}</h1>
    <p class="lead">Listed by <strong>{{ $auction->user->name }}</strong></p>

    <!-- Current Bid -->
    <div class="card text-white bg-primary mb-4 text-center">
        <div class="card-body">
            <h2 class="card-title">${{ number_format($auction->bids->sum('bid_amount'), 2) }}</h2>
            <p class="card-text">Current Bid</p>
        </div>
    </div>

    <div class="row">
        <!-- Timer Card -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">Time Remaining</div>
                <div class="card-body text-center">
                    <h3 class="text-primary" x-data="timer('{{ $auction->end_date }}')" x-text="timeRemaining"></h3>
                </div>
            </div>
        </div>

        <!-- Auction Details -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">Auction Details</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        start price:<li>{{$auction->price}}</li>
                        entery_fee:<li>{{$auction->entery_fee}}</li>
                        minumum bid:<li>{{$auction->minumum_bid}}</li>
                        end_date:<li>{{\Carbon\Carbon::parse($auction->end_date)->format('M d, Y H:i')}}</li>
                       
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bid Form -->
    @if ($auction->user_id == Auth::user()->id)
        u r
        @else
        @if($auction->end_date > now())
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('auctions.bid', [$auction,]) }}" method="POST">
                    @csrf
                    <label class="form-label">Place Your Bid</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" name="bid_amount" step="0.01" min="{{ $auction->bids->sum('bid_amount') + $auction->minumum_bid }}" 
                               class="form-control" placeholder="Enter amount">
                               @error('bid_amount')
                                   <p>{{$message}}</p>
                               @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Place Bid Now</button>
                </form>
            </div>
        </div>
        @else
        <div class="alert alert-danger text-center">This auction has ended <br>
            @if ($auction->bids->last())
            the win is {{$auction->bids->last()->user->name}}    
            @else
            no one win
            @endif
             
        </div>
        @endif
    @endif
   

    <!-- Bid History -->
    <div class="card">
        <div class="card-header bg-primary text-white text-center">Bid History</div>
        <div class="card-body">
            @forelse($auction->bids()->latest()->take(5)->get() as $bid)
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-2" style="width: 40px; height: 40px;">
                        {{ substr($bid->user->name, 0, 1) }}
                    </div>
                    <span>{{ $bid->user->name }}</span>
                    @if ($auction->is_sold == 1)

                        @else
                        @if ($auction->user_id == Auth::user()->id)
                    <form action="{{route("auction.end",[$auction,$bid->user->id])}}" method="post">
                        @csrf
                        @method("put")
                        <button>winner</button>
                    </form>
                    @endif
                    @endif
                    
                    
                </div>
                <strong class="text-primary">${{ number_format($bid->bid_amount, 2) }}</strong>
            </div>
            @empty
            <p class="text-muted text-center py-3">No bids placed yet. Be the first!</p>
            @endforelse
            @if ($auction->is_sold == 1)
            is sold for {{App\Models\User::find($auction->sold_to)->name}}
            @endif

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@include('layouts.footer')
