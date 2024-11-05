
    <div class="header d-flex justify-content-between align-items-center">
        <h1>Manage Room</h1>
        <form class="d-flex">
            <a href="?controller=room&action=addForm" class="btn btn-outline-light me-2">ADD NEW ROOM</a>
            <input type="text" name="key" class="form-control search-bar" placeholder="Search..." aria-label="Search">
            <input type="hidden" name="controller" value="room"/>
            <button class="btn btn-outline-light ms-2" type="submit" name="action" value="search">Search</button>
            <a href="?controller=room&action=index" class="btn btn-outline-light ms-2">Clear</a>
        </form>
    </div>

        <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Actions</th>
    
                </tr>
            </thead>
            <tbody>
                    <?php foreach($roomList as $room): ?>
                    <tr>
                        <td><?php echo $room->id; ?></td>
                        <td><?php echo $room->type; ?></td>
                        <td><?php echo $room->price; ?></td>
                        <td><?php echo $room->detail; ?></td>
                        <td style="color: <?php echo $room->roomStatus == 0 ? '#28a745' : 'red'; ?>;">
                            <?php echo $room->roomStatus == 0 ? 'Available' : 'Occupied'; ?>
                        </td>
                        <td><a href="?controller=room&action=update&id=<?php echo $room->id; ?>"class = "btn btn-warning btn-sm">Update</a>
                        <!-- ปุ่ม Delete ในแต่ละแถว -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                data-id="<?php echo $room->id; ?>" 
                                data-type="<?php echo htmlspecialchars($room->type); ?>"
                                data-price="<?php echo $room->price; ?>"
                                data-detail="<?php echo htmlspecialchars($room->detail); ?>">
                    
                            Delete
                        </button>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- DeleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure to delete this Room?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Room ID:</strong> <span id="modalRoomId"></span></p>
        <p><strong>Room Type:</strong> <span id="modalRoomType"></span></p>
        <p><strong>Price:</strong> <span id="modalRoomPrice"></span></p>
        <p><strong>Detail:</strong> <span id="modalRoomDetail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" id="confirmDeleteButton">Delete</a> 
      </div>
    </div>
  </div>
</div>

<!-- Delete Script -->
<script>
document.addEventListener('DOMContentLoaded', function () { //
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        // รับปุ่มที่เรียก Modal และดึงข้อมูลออกมา
        var button = event.relatedTarget;
        var roomId = button.getAttribute('data-id');
        var roomType = button.getAttribute('data-type');
        var roomPrice = button.getAttribute('data-price');
        var roomDetail = button.getAttribute('data-detail');
        
        // อัปเดตเนื้อหาใน modal-body ด้วยข้อมูลห้องที่เลือก
        document.getElementById('modalRoomId').textContent = roomId;
        document.getElementById('modalRoomType').textContent = roomType;
        document.getElementById('modalRoomPrice').textContent = roomPrice;
        document.getElementById('modalRoomDetail').textContent = roomDetail;

        // อัปเดตลิงก์ของปุ่ม Delete ใน Modal ด้วย room id ที่ได้มา
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.href = '?controller=room&action=delete&id=' + roomId;
    });
});
</script>











