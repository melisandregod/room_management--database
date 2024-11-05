



    <div class="header d-flex justify-content-between align-items-center">
        <h1>Manage Room Detail</h1>
        <form class="d-flex">
            <a href="?controller=detail&action=addForm" class="btn btn-outline-light me-2">ADD NEW DETAIL</a>
            <input type="text" name="key" class="form-control search-bar" placeholder="Search..." aria-label="Search">
            <input type="hidden" name="controller" value="detail"/>
            <button class="btn btn-outline-light ms-2" type="submit" name="action" value="search">Search</button>
            <a href="?controller=detail&action=index" class="btn btn-outline-light ms-2">Clear</a>
        </form>
    </div>

        <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                        <th>ID</th>
                        <th>Detail</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($detailList as $detail): ?>
                    <tr>
                        <td><?php echo $detail->id; ?></td>
                        <td><?php echo $detail->name; ?></td>
                        <td><a href="?controller=detail&action=updateForm&id=<?php echo $detail->id; ?>"class = "btn btn-warning btn-sm">Update</a>
                        <!-- ปุ่ม Delete ในแต่ละแถว -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                data-id="<?php echo $detail->id; ?>" 
                                data-detail="<?php echo htmlspecialchars($detail->name); ?>"
                                >Delete
                        </button>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<!-- DeleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure to delete this Detail?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>DETAIL ID:</strong> <span id="modalDetailId"></span></p>
        <p><strong>DETAIL:</strong> <span id="modalDetailName"></span></p>
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
        var detailId = button.getAttribute('data-id');
        var detailName= button.getAttribute('data-detail');
        
        
        
        // อัปเดตเนื้อหาใน modal-body ด้วยข้อมูลห้องที่เลือก
        document.getElementById('modalDetailId').textContent = detailId;
        document.getElementById('modalDetailName').textContent = detailName;
        

        // อัปเดตลิงก์ของปุ่ม Delete ใน Modal ด้วย detail id ที่ได้มา
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.href = '?controller=detail&action=delete&id=' + detailId;
    });
});
</script>











