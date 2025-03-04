@include('layouts.navbar')
@include('layouts.Sidebar')

<div class="container py-5">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center">محفظتي</h1>

        <!-- عرض الإحصائيات -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">إجمالي المبالغ المودعة</div>
                    <div class="card-body">
                        <h5 class="card-title">${{ number_format($wallet->total_deposited, 2) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">إجمالي المبالغ المسحوبة</div>
                    <div class="card-body">
                        <h5 class="card-title">${{ number_format($wallet->total_withdrawn, 2) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">إجمالي المبالغ المحجوزة</div>
                    <div class="card-body">
                        <h5 class="card-title">${{ number_format($wallet->total_holded, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- عرض الرصيد -->
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="card-title">الرصيد الحالي</h2>
                    <p class="card-text">يمكنك إدارة رصيدك هنا.</p>
                </div>
                <div class="text-right bg-light p-3 rounded-lg">
                    <h3 class="font-weight-bold text-success">${{ number_format($wallet->balance, 2) }}</h3>
                    <p class="text-muted">رصيدك المتاح</p>
                </div>
            </div>
        </div>

        <!-- إضافة رصيد -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">إضافة رصيد</h2>
                <form action="{{ route('wallet.deposit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>المبلغ</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" name="amount" step="0.01" min="0" class="form-control" placeholder="أدخل المبلغ">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">إضافة الرصيد</button>
                </form>
            </div>
        </div>

        <!-- سحب رصيد -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">سحب رصيد</h2>
                <form action="{{ route('wallet.withdraw') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>المبلغ</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" name="amount" step="0.01" min="0" class="form-control" placeholder="أدخل المبلغ">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">سحب الرصيد</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
