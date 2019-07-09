<?php

	/**
	 *
	 *Notification Controller
	 *Fetch, Remove, Alter, Insert Notification and Notification Details.
	 */
	class Notification extends CI_Controller
	{

		function get_notification(){
			if (isset($_POST['userid'])) {
				$notification = $this->notification_model->Count_UserNotif($_POST['userid']);
				echo $notification;
			}
		}
				// display notification message
		function get_all_notification(){
			if (isset($_POST['userid'])) {
				$notification = $this->notification_model->get_all_notification($_POST['userid']);
				$out = ""; 	
				$date = "";
				foreach ($notification->result_array() as $e) {
					// $date_sql = $e['notif_date'];
					// $date_year = toString()date('m', $e['notif_date']);


					$old_date = $e['notif_date'];
					$month = intval(date("n", strtotime($old_date)));
					$date = intval(date("j", strtotime($old_date)));
					$hour = intval(date("G", strtotime($old_date)));
					$min = intval(date("i", strtotime($old_date)));

					$current_full_date = date('Y-m-d H:i:s');
					$current_month = intval(date("n", strtotime($current_full_date)));
					$current_date = intval(date("j", strtotime($current_full_date)));
					$current_hour = intval(date("G", strtotime($current_full_date)));
					$current_min = intval(date("i", strtotime($current_full_date)));

					if ($current_hour == $hour && $current_date == $date && $current_month == $month) {
						$past_time = $current_min - $min;
						$message = " minute(s) ago.";	
					}elseif ($current_hour != $hour && $current_date == $date && $current_month == $month) {
						$past_time = $current_hour - $hour;
						$message = " hour(s) ago.";	
					}elseif($current_date > $date && $current_month == $month){
						$past_time = $current_date - $date;
						$message = " day(s) ago.";
					}else{
						$past_time = "";
						$message = "Something went wrong!";
					}
					
					$out.= '<a class="dropdown-item" href="#">
							<small>'.$e['notification_message'].'</small>
			                <small><span style="float: right">'. $past_time . $message .'</span><br></small>
			                </a><hr>';
				}
				echo $out;
			}
		}
		function update_notification(){
			if (isset($_POST['userid'])) {
				$this->notification_model->update_notification($_POST['userid']);
				$out = "";
                echo $out;
			}
		}
	}

 ?>
