<?php
// เปลี่ยนเส้นทางไปยังหน้า index.php ในโฟลเดอร์ public
header("Location: admin/index.php");
exit; // ออกจากสคริปต์เพื่อป้องกันการทำงานของโค้ดหลังจาก redirect
?>