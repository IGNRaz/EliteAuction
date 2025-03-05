@include('layouts.navbar')
@auth
@include('layouts.Sidebar')
@endauth


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<div class="container mt-5" style="margin-right: 220px; max-width: calc(100% - 240px);">
    <h1 class="mb-4 text-success text-center">Auctions</h1>
    <div class="row">

        <div class="mt-4 d-flex gap-2">
            <form action="{{ route('filterAuctionsByCategory') }}" method="GET">
                <select name="catagory_id" class="form-select border-success" onchange="this.form.submit()">
                    <option value="">اختر فئة</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->catagory_name }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        @forelse($auctions as $auction)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card h-100 shadow border-success rounded">
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="card-title mb-0">{{ $auction->title }}</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text text-muted small">{{ Str::limit($auction->description, 80) }}</p>
                        <div class="row g-2 small">
                            <div class="col-6">
                                <i class="fas fa-tag text-success"></i>
                                <div><small>Starting Price</small></div>
                                <div class="fw-bold">${{ number_format($auction->price, 2) }}</div>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-dollar-sign text-success"></i>
                                <div><small>Current Price</small></div>
                                <div class="fw-bold">${{ number_format($auction->bids->sum('bid_amount'), 2) }}</div>
                            </div>
                            <div class="col-6">
                                <i class="far fa-clock text-warning"></i>
                                <div><small>Ends On</small></div>
                                <div class="fw-bold">{{ \Carbon\Carbon::parse($auction->end_date)->format('M d, Y') }}</div>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-gavel text-info"></i>
                                <div><small>Min. Bid</small></div>
                                <div class="fw-bold">${{ number_format($auction->minumum_bid, 2) }}</div>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if ($auction->is_active == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                            @if ($auction->is_sold == 1)
                                <span class="badge bg-info">Sold</span>
                            @else
                                <span class="badge bg-warning text-dark">Available</span>
                            @endif
                        </div>
                        <div class="mt-3 d-flex justify-content-center gap-2">
                            <a href="{{ route('viewAuctionDetails',[$auction->id]) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            @if ($auction->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                            <a href="{{ route('editAuction',[$auction->id]) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-edit me-1"></i> تعديل
                            </a>
                            @endif
                            
                            
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

@include('layouts.footer')
