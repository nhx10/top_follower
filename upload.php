<?php
// تأكد من وجود بيانات صورة في الطلب
if(isset($_POST['imageData'])) {
    // استقبال بيانات الصورة
    $imageData = $_POST['imageData'];

    // تحويل بيانات الصورة من قاعدة 64 إلى ملف صورة
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $imageData = base64_decode($imageData);

    // تحديد مسار حفظ الصورة
    $imageName = 'uploads/' . uniqid() . '.png'; // يمكنك تعديل اسم المجلد والصيغة حسب الحاجة

    // حفظ الصورة في الخادم
    file_put_contents($imageName, $imageData);

    // إرسال رسالة نجاح إلى العميل
    echo "Image uploaded successfully.";
} else {
    // إرسال رسالة خطأ في حال عدم توفر بيانات الصورة
    echo "No image data received.";
}
?>
