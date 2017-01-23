<?php
  $date      = $model->deadline;
  $startTime = '1300';
  $endTime   = '1400';
  $subject   = $model->name;
  $desc      = $model->description;

  $ical = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:" . md5(uniqid(mt_rand(), true)) . "example.com
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
DTSTART:".$date."T".$startTime."00Z
DTEND:".$date."T".$endTime."00Z
SUMMARY:".$subject."
DESCRIPTION:".$desc."
END:VEVENT
END:VCALENDAR";

  //set correct content-type-header
  header('Content-type: text/calendar; charset=utf-8');
  header('Content-Disposition: inline; filename=atividade.ics');
  echo $ical;
  exit;
?>