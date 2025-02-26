@include('layouts.navbar')
@include('layouts.Sidebar')

<div class="container mt-5">
    <h1 class="mb-4 text-center">إضافة مزاد جديد</h1>
    <form action="{{ route('auction.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="title" class="form-label">عنوان المزاد</label>
            <input type="text" name="title" id="title" class="form-control form-control-sm" required>
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">وصف المزاد</label>
            <textarea name="description" id="description" class="form-control form-control-sm" rows="3" required></textarea>
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">السعر الابتدائي</label>
            <input type="number" name="price" id="price" class="form-control form-control-sm" required>
        </div>

        <div class="mb-2">
            <label for="end_date" class="form-label">تاريخ الانتهاء</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control form-control-sm" required>
        </div>

        <div class="mb-2">
            <label for="entery_fee" class="form-label">رسوم الدخول</label>
            <input type="number" name="entery_fee" id="entery_fee" class="form-control form-control-sm" required>
        </div>

        <div class="mb-2">
            <label for="minumum_bid" class="form-label">أقل مبلغ للمزايدة</label>
            <input type="number" name="minumum_bid" id="minumum_bid" class="form-control form-control-sm" required>
        </div>

        <div class="mb-2">
            <label for="category_id" class="form-label">الفئة</label>
            <select name="catagory_id" id="category_id" class="form-control form-control-sm" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->catagory_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label for="images" class="form-label">الصور</label>
            <input type="file" name="images[]" id="images" class="form-control form-control-sm" multiple>
        </div>

        <div class="mb-2">
            <label for="videos" class="form-label">الفيديوهات</label>
            <input type="file" name="videos[]" id="videos" class="form-control form-control-sm" multiple>
        </div>

        <button type="submit" class="btn btn-primary btn-sm w-100">إضافة المزاد</button>
    </form>
</div>

@include('layouts.footer')
