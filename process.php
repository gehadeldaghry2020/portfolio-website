<?php
if(isset($_POST['submit'])) {
    // اتصال بقاعدة البيانات - قم بتعديل المعلومات وفقا لاتصالك بقاعدة البيانات
   
    $name ="Name";
    $password = "";
    $dbname = "formdb";

    // إنشاء اتصال
    $conn = new mysqli( $name, $password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // الحصول على البيانات المُدخلة من النموذج
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // استخدام استعلام SQL لإدخال البيانات في قاعدة البيانات
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === true) {
        echo "تم حفظ البيانات بنجاح.";
    } else {
        echo "حدث خطأ أثناء الحفظ: " . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
}
?>
