<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<!-- <link href="{{ asset('css/auctions.css') }}" rel="stylesheet"> -->

<div class="container mt-5">
    <h1 class="mb-4">My Auctions</h1>
    <div class="row">
        @forelse($auctions as $auction)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title h5 mb-0">{{ $auction->title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="card-text text-muted">{{ Str::limit($auction->description, 100) }}</p>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-tag text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted">Starting Price</small>
                                        <div class="fw-bold">${{ number_format($auction->price, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-dollar-sign text-success me-2"></i>
                                    <div>
                                        <small class="text-muted">Current Price</small>
                                        <div class="fw-bold">${{ number_format($auction->current_price, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="far fa-clock text-warning me-2"></i>
                                    <div>
                                        <small class="text-muted">Ends On</small>
                                        <div class="fw-bold">{{ \Carbon\Carbon::parse($auction->end_date)->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-gavel text-info me-2"></i>
                                    <div>
                                        <small class="text-muted">Min. Bid</small>
                                        <div class="fw-bold">${{ number_format($auction->minumum_bid, 2) }}</div>
                                    </div>
                                    
                                </div>
                                <div>
                                @if ($auction->is_active == 1)
                                active
                                @else
                                not active
                                @endif 
                                </div>
                                <div>
                                @if ($auction->is_sold == 1)
                                is sold
                                @else
                                is not sold
                                @endif 
                                </div>
                                <!-- {{ $auction->is_active  }} -->
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route("viewAuctionDetails",[$auction->id]) }}" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            <a href="{{ route("editAuction",[$auction->id]) }}">edit</a>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>No auctions found.</div>
                </div>
            </div>
        @endforelse
    </div>
</div>
