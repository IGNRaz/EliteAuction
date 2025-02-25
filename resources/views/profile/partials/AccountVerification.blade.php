<h1>يجب أن تقوم بتوثيق الحساب أولا لكي يكون لديك محفظة</h1>
<form action="{{ route("MyWallet.store" , [Auth::user()]) }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="Document" accept=".pdf,.jpg,.jpeg,.png" required><br>
    رقم الهاتف<input type="text" name="PhoneNumber"><br>
    نوع الوثيقة<select name="DocumentType">
    <option value="passport">جواز سفر</option>
    <option value="id">هوية شخصية</option>
    </select>
    <button>store</button>
</form>