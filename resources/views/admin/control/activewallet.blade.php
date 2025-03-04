@include('layouts.navbar')

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الوثائق</title>
    <!-- إضافة Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            @foreach ($userdoc as $user)
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">مستخدم: {{ $user->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">البريد الإلكتروني: {{ $user->email }}</h6>

                        @if($user->doc)
                        <div class="doc-details mt-3">
                            <p><strong>نوع الوثيقة:</strong> {{ $user->doc->doc_type }}</p>

                            @php
                                $docPath = $user->doc->doc_path;
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                $documentExtensions = ['pdf', 'docx', 'txt'];
                                $fileExtension = strtolower(pathinfo($docPath, PATHINFO_EXTENSION));
                            @endphp

                            @if (in_array($fileExtension, $imageExtensions)) <!-- إذا كانت صورة -->
                                <img src="{{ asset('storage/' . $docPath) }}" alt="Document Image" class="img-fluid rounded mb-3" style="max-height: 200px;">
                            @elseif (in_array($fileExtension, $documentExtensions)) <!-- إذا كان مستند -->
                                <p>محتوى الوثيقة: <a href="{{ asset('storage/' . $docPath) }}" target="_blank" class="btn btn-primary">تحميل الوثيقة</a></p>
                            @else
                                <p>نوع غير معروف للوثيقة.</p>
                            @endif

                            <!-- نموذج قبول/رفض -->
                            <div class="mt-3">
                                <form action="{{ route('active.wallet.sorte', $user->doc->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" name="action" value="accept" class="btn btn-success">قبول</button>
                                </form>
                                <form action="{{ route('active.wallet.sorte', $user->doc->id) }}" method="POST" class="d-inline-block ml-2">
                                    @csrf
                                    <button type="submit" name="action" value="reject" class="btn btn-danger">رفض</button>
                                </form>
                            </div>
                        </div>
                        @else
                            <p>لا توجد وثائق لهذا المستخدم.</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- إضافة Bootstrap و JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB6U02dZ6yYLOjSmT2l3Z9g5d4v4fa8G38lPpGZVp5epFlp6X" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq8kcAOdP0p+3cyl5+rfPpPzwgB+8Kz1g5Sx2KjoSyU1F" crossorigin="anonymous"></script>

    <script>
        // استخدام JavaScript لتحسين التفاعل أو الرسائل المنبثقة أو التنبيهات
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('تم إرسال الطلب!');
            });
        });
    </script>

</body>
</html>
@include('layouts.footer')
