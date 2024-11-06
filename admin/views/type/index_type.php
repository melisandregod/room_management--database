
        <div class="header d-flex justify-content-between align-items-center">
        <h1>Manage Room Type</h1>
        <form class="d-flex">
            <a href="?controller=type&action=addForm" class="btn btn-outline-light me-2">ADD NEW TYPE</a>
            <input type="text" name="key" class="form-control search-bar" placeholder="Search...Type" aria-label="Search">
            <input type="hidden" name="controller" value="type"/>
            <button class="btn btn-outline-light ms-2" type="submit" name="action" value="search">Search</button>
            <a href="?controller=type&action=index" class="btn btn-outline-light ms-2">Clear</a>
        </form>
    </div>

        <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($typeList as $type): ?>
                    <tr>
                        <td><?php echo $type->id; ?></td>
                        <td><?php echo $type->name; ?></td>
                        <td><?php echo $type->price; ?></td>
                        <td><a href="?controller=type&action=updateForm&id=<?php echo $type->id; ?>"class = "btn btn-warning btn-sm">Update</a>
                        <!-- ปุ่ม Delete ในแต่ละแถว -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                data-id="<?php echo $type->id; ?>" 
                                data-type="<?php echo htmlspecialchars($type->name); ?>"
                                data-price="<?php echo $type->price; ?>"
                                >Delete
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
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure to delete this Type?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>TYPE ID:</strong> <span id="modalTypeId"></span></p>
        <p><strong>Type:</strong> <span id="modalTypeType"></span></p>
        <p><strong>Price:</strong> <span id="modalTypePrice"></span></p>
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
        var typeId = button.getAttribute('data-id');
        var nameType = button.getAttribute('data-type');
        var typePrice = button.getAttribute('data-price');
        
        
        // อัปเดตเนื้อหาใน modal-body ด้วยข้อมูลห้องที่เลือก
        document.getElementById('modalTypeId').textContent = typeId;
        document.getElementById('modalTypeType').textContent = nameType;
        document.getElementById('modalTypePrice').textContent = typePrice;
        

        // อัปเดตลิงก์ของปุ่ม Delete ใน Modal ด้วย type id ที่ได้มา
        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.href = '?controller=type&action=delete&id=' + typeId;
    });
});
</script>










