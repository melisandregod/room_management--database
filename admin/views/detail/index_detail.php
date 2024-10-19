



    <div class="header d-flex justify-content-between align-items-center">
        <h1>Manage Room Detail</h1>
        <form class="d-flex">
            <a href="#" class="btn btn-light me-2">ADD NEW DETAIL</a>
            <input type="search" class="form-control search-bar" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light ms-2" type="submit">Search</button>
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
                        <td><a href="?controller=rooms&action=update&id=<?php echo $room->id; ?>"class = "btn btn-warning btn-sm">Update</a>
                        <a href="?controller=rooms&action=delete&id=<?php echo $room->id; ?>"class = "btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>












