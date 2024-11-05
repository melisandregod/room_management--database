<style>
    .form-container {
            padding: 20px;
            border-radius: 15px;
            background-color: white; /* พื้นหลังของ container */
            box-shadow: 0 10px 8px rgba(0, 0, 0, 0.1); /* เงาของ container */
        }
        .btn-add {
            background-color: #018749; /* สีพื้นหลังของปุ่ม */
            color: white; /* สีข้อความ */
            border: 2px solid white; /* เส้นขอบ */
            padding: 10px 20px; /* การเว้นระยะด้านในของปุ่ม */
            font-size: 16px; /* ขนาดตัวอักษร */
            font-weight: bold; /* ตัวหนา */
            border-radius: 8px; /* ขอบโค้งมน */
            cursor: pointer; /* เปลี่ยนเป็นรูปมือเมื่อ hover */
            text-align: center; /* จัดข้อความให้อยู่กลางปุ่ม */
            transition: background-color 0.3s ease; /* เพิ่ม transition เวลา hover */
        }

        .btn-add:hover {
            background-color: #00B35F; /* สีพื้นหลังเมื่อ hover */
        }

        
</style>

    <div class="container mt-5 form-container">
        <h2 class="text-center">Add New Type</h2>
        
        <form method="get"action="">
            <div class="mb-3">
                <label for="typeId" class="form-label">Type ID</label>
                <input type="text" class="form-control" id="typeId" name="typeId" required>
            </div>
            <div class="mb-3">
                <label for="typeName" class="form-label">Type</label>
                <input type="text" class="form-control" id="typeName" name="typeName" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <input type="hidden" name="controller" value="type"/>               
            <button type="submit" class="btn-add me-2" name="action" value="addType">Add Type</button>
            <button type="button" class="btn-add me-2" onclick="window.history.back();">Back</button>
        </form>
    </div>
            
            
