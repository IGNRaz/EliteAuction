    <!-- Sidebar -->
    <div class="sidebar">
        <h4>لوحة التحكم</h4>
        <a href="{{route('dashboard')}}" class="left">
            <i class="fas fa-home"></i>
            <span class="text">الصفحة الرئيسية</span>
        </a>
        <a href="{{route('profile.edit')}}" class="left">
            <i class="fas fa-user-circle"></i>
            <span class="text">حسابي</span>
        </a>
        <a href="{{ route('myAcutions') }}" class="left">
            <i class="fas fa-gavel"></i>
            <span class="text">مزاداتي</span>
        </a>
        <a href="{{ route('auction.create') }}" class="left">
            <i class="fas fa-plus-circle"></i>
            <span class="text">إضافة مزاد</span>
        </a>
        <a href="#" class="left">
            <i class="fas fa-trophy"></i>
            <span class="text">المزادات الرابحة</span>
        </a>


        <a href="#" class="left">
            <i class="fas fa-times-circle"></i>
            <span class="text">المزادات الخاسرة</span>
        </a>
        <a href="{{route('MyWallet.add')}}" class="left">
            <i class="fas fa-wallet"></i>
            <span class="text">محفظتي</span>
        </a>
        @if (Auth::user()->role == 'admin')
            
        <a href="{{route('admin.dashboard')}}" class="left">
            <i class="fas fa-user-shield"></i>
            <span class="text">ADMIN DASHBOARD</span>
        </a>
        @endif

        <!-- Logout Button داخل الـ Sidebar -->
        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
            </button>
        </form>
    </div>

      <!-- Main Content -->
      <div class="content">
        <div class="container">
            <div class="row">
