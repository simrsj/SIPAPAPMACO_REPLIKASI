<html>
<head>
    <link href="css/calendar.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php
include 'Calendar.php';
include 'Booking.php';
include 'bookableCell.php';
 
 
$booking = new Booking(
    'db_sm',
    'localhost',
    'root',
    ''
);
 
$bookableCell = new BookableCell($booking);
 
$calendar = new Calendar();
 
$calendar->attachObserver('showCell', $bookableCell);
 
$bookableCell->routeActions();
 
echo $calendar->show();
?>
</body>
</html>