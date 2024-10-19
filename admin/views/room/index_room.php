
    <div class="header d-flex justify-content-between align-items-center">
        <h1>Manage Room</h1>
        <form class="d-flex">
            <a href="#" class="btn btn-light me-2">ADD NEW ROOM</a>
            <input type="text" name="key" class="form-control search-bar" placeholder="Search..." aria-label="Search">
            <input type="hidden" name="controller" value="room"/>
            <button class="btn btn-outline-light ms-2" type="submit" name="action" value="search">Search</button>
            <a href="?controller=room&action=index" class="btn btn-danger ms-2">Clear Search</a>
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
                        <a href="?controller=room&action=delete&id=<?php echo $room->id; ?>"class = "btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>








