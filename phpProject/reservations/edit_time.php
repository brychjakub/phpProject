<?php
// Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'first_db';

try {
    // Execute the SQL UPDATE statement to synchronize the time column
$sql = 'UPDATE reservations
JOIN pupils ON reservations.pupilID = pupils.ID
SET reservations.time = pupils.note';
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Retrieve the updated time value from the reservations table
$time = ''; // Initialize the time variable
$pupilId = $_GET['edit']; // Assuming you have the pupil ID from the URL parameter
$stmt = $pdo->prepare('SELECT time FROM reservations WHERE pupilID = ?');
$stmt->bindParam(1, $pupilId);
$stmt->execute();
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if ($reservation) {
$time = $reservation['time'];
}

// Display the time value or use it for further processing
echo '<input class="text" type="text" name="time" readonly value="' . $time . '">';

    $editValue = $_GET['edit'];

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement to fetch events
    $stmt = $pdo->prepare('SELECT * FROM events');

    // Execute the prepared statement
    $stmt->execute();

    // Fetch all events
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Display error message
    echo 'Error: ' . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rezervace CMcZŠ</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="create_event.html">Vytvořit událost</a></li>
                <li><a href="event_list.php">Události</a></li>
                <li><a href="../questions/questions.html">Dotazník</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Seznam událostí</h2>
            <table>
                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Kdy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><a href="#" onclick="showOptions(<?php echo $event['id']; ?>)"><?php echo $event['eventName']; ?></a></td>
                            <td><?php echo date('d.m.Y', strtotime($event['startDate'])); ?> ; <?php echo date('H:i', strtotime($event['startTime'])); ?> - <?php echo date('H:i', strtotime($event['endTime'])); ?></td>
                           
                           
                         
                        </tr>
                        <tr id="options-<?php echo $event['id']; ?>" style="display: none;">
    <td colspan="3">
        <?php
        // Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'first_db';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $startTime = strtotime($event['startTime']);
      $endTime = strtotime($event['endTime']);
      $bookingPeriod = $event['bookingPeriod'];
      $interval = '+' . $bookingPeriod . ' minutes';
      
      $capacity = 6;

   
      for ($i = 1; $i <= $capacity; $i++) {
          $slotTime = date('H:i', $startTime);
          
          // Get the maximum reservation number for the event and slot time
          $maxReservationNumberStmt = $pdo->prepare('SELECT MAX(reservationNumber) AS maxReservationNumber FROM reservations WHERE eventID = ? AND time = ?');
          $maxReservationNumberStmt->bindParam(1, $event['id']);
          $maxReservationNumberStmt->bindParam(2, $slotTime);
          $maxReservationNumberStmt->execute();
          $maxReservationNumberResult = $maxReservationNumberStmt->fetch(PDO::FETCH_ASSOC);
          $maxReservationNumber = $maxReservationNumberResult['maxReservationNumber'];
          $takenSlots = $maxReservationNumber ?? 0;

           // Check if the slots are fully taken
    $isFullyTaken = $takenSlots >= $capacity;
 // Display the appropriate slot information
 if ($isFullyTaken) {
    echo '<div>Fully Reserved</div>';
} else {
    // Apply CSS classes based on the slots availability
    $slotClass = 'slot-available';
    $linkClass = '';

    echo '<div><a href="edit_reservation.php?edit=' . urlencode($editValue) . '&slotTime=' . $slotTime . '" class="' . $linkClass . ' ' . $slotClass . '">' . $slotTime . '</a> (' . $takenSlots . '/' . $capacity . ' slots taken)</div>';
}

$startTime = strtotime($interval, $startTime);
}

if ($isFullyTaken) {
echo '<div>Fully Reserved</div>';
}
} catch (PDOException $e) {
    // Display error message
    echo 'Error: ' . $e->getMessage();
}
      
        ?>
    </td>
</tr>




                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showOptions(eventId) {
            var options = document.getElementById('options-' + eventId);
            if (options.style.display === 'none') {
                options.style.display = 'table-row';
            } else {
                options.style.display = 'none';
            }
        }

        function reserveSlot(eventId, slotId) {
            // Add your logic to handle the reservation for the selected event and slot
        }
    </script>
</body>
</html>