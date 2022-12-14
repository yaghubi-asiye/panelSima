<?php
include_once('config/database.php');

// Get daily report
$pdo = Database::connect();
$sql = 'SELECT * FROM meetings WHERE state = 1';
$db_timetables  = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

Database::disconnect();

//fetch tha data from the database
$timetables = array();
foreach ($db_timetables as $db_timetable) {
	$timetable = new stdClass();
	$timetable->name = $db_timetable['name'];
	$timetable->meetingId = $db_timetable['id'];
	$timetable->members = $db_timetable['members'];
	$timetable->agendaFileName = $db_timetable['agendaFile'];
	$timetable->attachmentsFileName = $db_timetable['attachmentsFile'];
	$timetable->proceedingFileName = $db_timetable['proceedingFile'];
	$timetable->image = $db_timetable['image'];
	$timetable->date = date('j', strtotime($db_timetable['date']));
	$timetable->month = date('n', strtotime($db_timetable['date']));
	$timetable->year = date('Y', strtotime($db_timetable['date']));
	$timetable->day = $db_timetable['day'];
	$timetable->start_time = $db_timetable['start_time'] ? date('H:i', strtotime($db_timetable['start_time'])) : '';
	$timetable->end_time = $db_timetable['end_time'] ? date('H:i', strtotime($db_timetable['end_time'])) : '';
	$timetable->color = $db_timetable['color'];
	$timetable->description = nl2br($db_timetable['description']);

	array_push($timetables, $timetable);
}

echo json_encode($timetables);
?>
