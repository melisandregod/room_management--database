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
        <h2 class="text-center">Add New Room</h2>
        
        <form method="get"action="">
            <div class="mb-3">
                <label for="roomId" class="form-label">Room ID</label>
                <input type="text" class="form-control" id="roomid" name="roomid" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Room Type</label>
                <select class="form-select" id="typeid" name="typeid" required>
                
                    <option value="">-- Select Room Type --</option>
                    <?php foreach($typeList as $type){
                    echo "<option value=$type->id>$type->name</option>";}
                    ?>
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Room Details</label>
                <div id="details-container">
                    <div class="input-group mb-2">
                    <select class="form-select" id="detail" name="detail[]" required>
                
                        <option value="">-- Select Room Detail --</option>
                        <?php foreach($detailList as $detail){
                        echo "<option value=$detail->id>$detail->name</option>";}
                        ?>
                
                    </select>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addDetailField()">Add More Detail</button>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Room Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="0">Available</option>
                    <option value="1">Occupied</option>
                </select>
            </div>
            <input type="hidden" name="controller" value="room"/>               
            <button type="submit" class="btn-add me-2" name="action" value="addRoom">Add Room</button>
            <button type="button" class="btn-add me-2" onclick="window.history.back();">Back</button>
            
        </form>
    </div>

    <script>
        function addDetailField() {
            // สร้างฟิลด์ใหม่สำหรับกรอกรายละเอียดห้อง
            var detailField = `
                <div class="input-group mb-2">
                <select class="form-select" id="detail" name="detail[]" required>
                
                <option value="">-- Select Room Detail --</option>
                <?php foreach($detailList as $detail){
                echo "<option value=$detail->id>$detail->name</option>";}
                ?>
        
                 </select>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeDetailField(this)">Remove</button>
                </div>`;
            document.getElementById('details-container').insertAdjacentHTML('beforeend', detailField);
        }

        function removeDetailField(button) {
            // ลบฟิลด์กรอกรายละเอียดห้อง
            button.parentElement.remove();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
