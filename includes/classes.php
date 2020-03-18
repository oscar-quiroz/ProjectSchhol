<?php 
include 'manifest.php';
include 'database.php';
include 'person.php';
include 'user.php';
include 'task.php';
include 'subject_group.php';

function spanishDay ($date) {
	$day = date('l', strtotime(substr($date, 0, 10)));
	$days_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$days_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

	return str_replace($days_EN, $days_ES, $day);
}

function spanishMonth ($date) {
	$month = date('F', strtotime(substr($date, 0, 10)));
	$month_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$month_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	return str_replace($month_EN, $month_ES, $month);
}
?>