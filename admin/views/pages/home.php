<?php

// รับข้อมูลสถิติห้อง
$roomStats = Room::getRoomStats();

// รับข้อมูลประเภทห้อง
$roomTypesStats = Room::getRoomTypesStats();

// แยกชื่อประเภทห้องและจำนวนห้องออกมา
$typeNames = [];
$typeCounts = [];

foreach ($roomTypesStats as $type) {
    $typeNames[] = $type['typeName'];
    $typeCounts[] = $type['count'];
}

?>



    <style>        
        .card {
            border-radius: 15px; /* ขอบโค้งมนสำหรับการ์ด */
        }
        .card-header {
            font-weight: bold;
            text-align: left; /* หัวเรื่องอยู่ทางซ้าย */
        }
        .bg-custom {
            background-color: #018749 !important; /* สีพื้นหลังการ์ด */
        }

        .bg-custom-1{
            background-color: #00B35F ; /* สีพื้นหลังการ์ด */
        }
        .bg-custom-2{
            background-color: #DC143C ; /* สีพื้นหลังการ์ด */
        }

        .btn-custom {
            background-color: #018749; /* ปรับสีปุ่ม */
            color: white;
        }
        .btn-custom:hover {
            background-color: #016e3b; /* สีเมื่อ hover */
        }
        .dashboard-container {
            padding: 20px;
            border-radius: 15px;
            background-color: white; /* พื้นหลังของ container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เงาของ container */
        }
    </style>
</head>
<body>
    <div class="container mt-5 dashboard-container">
        <h1 class="mb-4 text-center">Dashboard</h1>
        
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card text-white bg-custom mb-3">
                    <div class="card-header">Total Rooms</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $roomStats['totalRooms']; ?></h5>
                        <p class="card-text">Total number of rooms in the system.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-custom-1 mb-3">
                    <div class="card-header">Available Rooms</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $roomStats['availableRooms']; ?></h5>
                        <p class="card-text">Total number of available rooms.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-custom-2 mb-3">
                    <div class="card-header">Occupied Rooms</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $roomStats['occupiedRooms']; ?></h5>
                        <p class="card-text">Total number of occupied rooms.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-custom text-white">Booked and Unbooked Rooms</div>
                    <div class="card-body">
                        <canvas id="roomStatusChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-custom text-white">All Room Types</div>
                    <div class="card-body">
                        <canvas id="roomTypesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <a href="manage_rooms.php" class="btn btn-custom btn-lg btn-block mt-4">Manage Rooms</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const roomStatusChart = document.getElementById('roomStatusChart').getContext('2d');
        const roomStatus = new Chart(roomStatusChart, {
            type: 'doughnut',
            data: {
                labels: ['Available Rooms', 'Occupied Rooms'],
                datasets: [{
                    data: [<?php echo $roomStats['availableRooms']; ?>, <?php echo $roomStats['occupiedRooms']; ?>],
                    backgroundColor: ['#00B35F', '#DC143C'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const roomTypesChart = document.getElementById('roomTypesChart').getContext('2d');
        const colors = [
        '#018749', '#4CAF82', '#00B35F', '#f39c12', '#3498db', '#e74c3c', '#9b59b6', '#1abc9c'
        ]; 
        const roomTypes = new Chart(roomTypesChart, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($typeNames); ?>, // ส่งชื่อประเภทห้องจาก PHP
                datasets: [{
                    label: 'Number of Rooms',
                    data: <?php echo json_encode($typeCounts); ?>, // ส่งจำนวนห้องจาก PHP
                    backgroundColor: colors.slice(0, <?php echo count($typeNames); ?>),
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    
           

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    