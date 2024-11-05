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
        <h2 class="text-center">Update New Room</h2>
        
        <form method="get"action="">
            <div class="mb-3">
                <label for="roomId" class="form-label">Room ID</label>
                <input type="text" class="form-control-plaintext" id="roomid" name="roomid" value="<?php echo $room->id;?>">
            </div>
            <!-- room type -->
            <div class="mb-3">
                <label for="type" class="form-label">Room Type</label>
                <select class="form-select" id="typeid" name="typeid" required>
                    <?php foreach($typeList as $type): ?>
                        <option value="<?php echo $type->id; ?>" <?php echo ($type->id == $typeid) ? 'selected' : ''; ?>>
                            <?php echo $type->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- ใช้ selected ง่ายกว่าาา-->

            <!-- room detail list-->
            <div class="mb-3">
                <label for="details" class="form-label">Room Details</label>
                <div id="details-container">
                    <?php foreach($roomDetailList as $roomDetail): ?> <!-- ลูปใน roomdetaillist ของห้องที่อัพเดท -->
                        <div class="input-group mb-2">
                            <select class="form-select" id="detail" name="detail[]" required>
                                <option value="">-- Select Room Detail --</option>
                                <?php foreach($detailList as $detail): ?> <!-- ลูป detaillist ละนำมาเปรียบเทียบเพื่อเเสดงผล -->
                                    <option value="<?php echo $detail->id; ?>" <?php echo ($detail->id == $roomDetail->detailid) ? 'selected' : ''; ?>>
                                        <?php echo $detail->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeDetailField(this)">Remove</button>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="btn-add" onclick="addDetailField()">Add More Detail</button>
            </div>
            <!-- status -->
            <div class="mb-3">
                <label for="status" class="form-label">Room Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="0" <?php echo ($room->roomStatus == 0) ? 'selected' : ''; ?>>Available</option>
                    <option value="1" <?php echo ($room->roomStatus == 1) ? 'selected' : ''; ?>>Occupied</option>
                </select>
            </div>

            <input type="hidden" name="controller" value="room"/>               
            <button type="submit" class="btn-add me-2" name="action" value="update">Update</button>
            <button type="button" class="btn-add me-2" onclick="window.history.back();">Back</button>
            
        </form>
    </div>
    



    



<script>
    function addDetailField() {
        // สร้างฟิลด์ใหม่สำหรับรายละเอียดห้อง
        var detailField = `
            <div class="input-group mb-2">
                <select class="form-select" name="detail[]" required>
                    <option value="">-- Select Room Detail --</option>
                    <?php foreach($detailList as $detail): ?>
                        <option value="<?php echo $detail->id; ?>"><?php echo $detail->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeDetailField(this)">Remove</button>
            </div>`;
        
        // เพิ่มฟิลด์ใหม่เข้าไปใน container ที่มี id="details-container"
        document.getElementById('details-container').insertAdjacentHTML('beforeend', detailField);
    }

    function removeDetailField(button) {
        // ลบฟิลด์สำหรับรายละเอียดห้องเมื่อกดปุ่ม Remove
        button.parentElement.remove();
    }
</script>



