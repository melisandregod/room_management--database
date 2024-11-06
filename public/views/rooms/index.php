<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

::after,
::before {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

h1 {
    font-weight: 600;
    font-size: 1.5rem;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f0f0; /* สีพื้นหลัง */
    
}

.wrapper {
    display: flex;
}

.main {
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: #fafbfe;
}

.header {
    background-color: #018749; /* สีเขียวสำหรับ header */
    padding: 15px;
    border-radius: 10px; /* โค้งมนที่ด้านล่าง */
    color: #ffffff; /* สีข้อความ */
}

.room-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
.room-image {
    height: 200px;
    object-fit: cover;
    width: 100%;
}
.room-details {
    padding: 15px;
}
.room-title {
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
}
.room-price {
    color: #28a745;
    font-weight: bold;
}
.custom-navbar {
background-color: #018749 ; /* สีเขียว */
}
.custom-navbar .navbar-brand,
.custom-navbar .nav-link {
    color: #ffffff !important; 
}
</style>
<body>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Rooms</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 form-container">
    <h2 class="text-center mb-4">Our Finest Collection of Rooms</h2>

    <!-- ฟอร์มเลือกการจัดเรียง -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="">Sort By</option>
                    <option value="price_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected'; ?>>Price: Low to High</option>
                    <option value="price_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected'; ?>>Price: High to Low</option>
                    <option value="available" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'available') echo 'selected'; ?>>Available</option>
                    <option value="occupied" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'occupied') echo 'selected'; ?>>Occupied</option>
                </select>
            </div>
        </div>
    </form>

    <div class="row">
        <?php foreach ($rooms as $room): ?>
        <div class="col-md-4">
            <div class="room-card">
                <img src="testImage.jpg" alt="Room Image" class="room-image">
                <div class="room-details">
                    <h5 class="room-title"><?php echo $room['typeName']; ?> Type</h5>
                    <p><span class="room-price"><?php echo number_format($room['price'], 2); ?> BATH per day</span></p>
                    <p><strong>Status:</strong> <?php echo $room['roomStatus'] == 0 ? 'Available' : 'Occupied'; ?><br>
                    <strong>Details:</strong> <?php echo $room['roomDetails']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
