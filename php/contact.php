<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Пожалуйста, введите Ваше имя';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Пожалуйста, введите Вашу электронную почту';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Пожалуйста, введите Ваш комментарий';
	}

		//Check if number has been entered
	if (!isset($_POST['tel'])) {
		$errors['tel'] = 'Пожалуйста, введите Ваш номер телефона';
	}

	$errorOutput = 'Попробуйте ещё раз!';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = $email;
	$to = 'viccipaolo@gmail.com';  // please change this email id
	$subject = 'Новая заявка с viksky.com';

	$body = "From: $name\n E-Mail: $email\n Message:\n $message";

	$headers = "From: ".$from;


	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Спасибо! Мы с Вами свяжемся.';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Что-то пошло не так. Пожалуйста, попробуйте позже.';
	$result .= '</div>';

	echo $result;
