@include('layouts.navbar')
@include('layouts.Sidebar')
<div class="container py-5">
    <div class="max-w-4xl mx-auto bg-white p-5 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-4 text-danger">
            يجب أن تقوم بتوثيق الحساب أولًا لكي يكون لديك محفظة
        </h1>
        <form action="{{ route('MyWallet.store', [Auth::user()]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- رفع الوثيقة -->
            <div class="form-group">
                <label class="font-weight-bold">رفع الوثيقة</label>
                <input type="file" name="Document" class="form-control-file border p-2 rounded" accept=".pdf,.jpg,.jpeg,.png" required>
            </div>

           
            <!-- نوع الوثيقة -->
            <div class="form-group">
                <label class="font-weight-bold">نوع الوثيقة</label>
                <select name="DocumentType" class="form-control">
                    <option value="passport">جواز سفر</option>
                    <option value="identity">هوية شخصية</option>
                </select>
            </div>

            <!-- زر الإرسال -->
            <button type="submit" class="btn btn-primary btn-block font-weight-bold">
                إرسال الطلب <i class="fas fa-upload"></i>
            </button>
        </form>
    </div>
</div>
@include('layouts.footer')
