@include('layouts.navbar')
@include('layouts.Sidebar')

<div class="content">
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-dark">مزاداتي</h2>
        <div class="row">
            @forelse($auctions as $auction)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow border-0">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title h5 mb-0">{{ $auction->title }}</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-muted">{{ Str::limit($auction->description, 100) }}</p>
                            <div class="row g-3">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-tag text-success me-2"></i>
                                    <div>
                                        <small class="text-muted">السعر الابتدائي</small>
                                        <div class="fw-bold">${{ number_format($auction->price, 2) }}</div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-dollar-sign text-primary me-2"></i>
                                    <div>
                                        <small class="text-muted">السعر الحالي</small>
                                        <div class="fw-bold">${{ number_format($auction->current_price, 2) }}</div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="far fa-clock text-warning me-2"></i>
                                    <div>
                                        <small class="text-muted">ينتهي في</small>
                                        <div class="fw-bold">{{ \Carbon\Carbon::parse($auction->end_date)->format('M d, Y') }}</div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-gavel text-info me-2"></i>
                                    <div>
                                        <small class="text-muted">الحد الأدنى للمزايدة</small>
                                        <div class="fw-bold">${{ number_format($auction->minumum_bid, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span class="badge {{ $auction->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $auction->is_active ? 'نشط' : 'غير نشط' }}</span>
                                <span class="badge {{ $auction->is_sold ? 'bg-info' : 'bg-warning text-dark' }}">{{ $auction->is_sold ? 'تم البيع' : 'متاح' }}</span>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <a href="{{ route('viewAuctionDetails',[$auction->id]) }}" class="btn btn-success flex-grow-1">
                                    <i class="fas fa-eye me-1"></i> عرض التفاصيل
                                </a>
                                <a href="{{ route('editAuction',[$auction->id]) }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-edit me-1"></i> تعديل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <div>لم يتم العثور على مزادات.</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@include('layouts.footer')
