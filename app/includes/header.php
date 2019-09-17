<?php use uziiuzair\crm; 

$currentUser 	= crm\Sessions::get('studioUserLogin');						# Current User Details
$theme 			= crm\Users::getUserField($currentUser->id, 'theme'); 		# Get User Theme

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
		
		<title><?php if (!empty($header)): echo $header . ' - ';  endif; echo crm\Config::SystemApplicationName; ?></title>
		
		<!-- Apple Icons -->
		<link rel="apple-touch-icon" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="76x76" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="120x120" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="152x152" href="/app/includes/images/">
		<link rel="icon" type="image/x-icon" href="/app/includes/images/">

		<!-- SEO? -->
		<meta property="og:url" content="<?php echo crm\Config::SystemPublicURL; ?>">
		<meta property="og:type" content="website">
		<meta property="og:title" content="">
		<meta property="og:description" content="">
		<meta property="og:image" content="/app/includes/images/">

		<link rel="shortcut icon" type="image/png" href="/app/includes/images/favicon.png"/>

		<!-- Scripts -->
		<script src="/app/includes/js/jquery.min.js"></script>
		<script src="/app/includes/js/select/select2.min.js"></script>
		<script src="/app/includes/js/datepicker/picker.js"></script>
		<script src="/app/includes/js/datepicker/picker.date.js"></script>
		<script src="/app/includes/js/moment.min.js"></script>
		<script src="/app/includes/js/chart.min.js"></script>
		<script src="/app/includes/js/notify.min.js"></script>
		<script src="/app/includes/js/list.js"></script>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="/app/includes/css/layout.css?v=<?php echo rand(); ?>">
		<link rel="stylesheet" class="changeStyle" data-color="<?php echo $theme; ?>"  href="/app/includes/css/<?php echo $theme; ?>.css?v=<?php echo rand(); ?>">
		<link rel="stylesheet" href="/app/includes/css/responsive.css?v=<?php echo rand(); ?>">
		<link rel="stylesheet" href="/app/includes/css/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="/app/includes/js/datepicker/classic.date.css">
		<link rel="stylesheet" href="/app/includes/js/select/select2.min.css">
		<link rel="stylesheet" href="/app/includes/js/datepicker/classic.css">
	
	</head>
	
	<body>

		<div class="SlideOutMobile"></div>

		<main>

			<div class="sidebar">
				<div class="logo">
					<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
						<path fill="currentColor" d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z" class=""></path>
					</svg>
				</div>

				<div class="menu">
					<nav>
						<ul>
							<li data-page="Dashboard">
								<a href="<?php echo crm\Routes::url('dashboard'); ?>">
									<svg  style="width:27px;" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
										<path fill="currentColor" d="M541 229.16l-61-49.83v-77.4a6 6 0 0 0-6-6h-20a6 6 0 0 0-6 6v51.33L308.19 39.14a32.16 32.16 0 0 0-40.38 0L35 229.16a8 8 0 0 0-1.16 11.24l10.1 12.41a8 8 0 0 0 11.2 1.19L96 220.62v243a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-128l64 .3V464a16 16 0 0 0 16 16l128-.33a16 16 0 0 0 16-16V220.62L520.86 254a8 8 0 0 0 11.25-1.16l10.1-12.41a8 8 0 0 0-1.21-11.27zm-93.11 218.59h.1l-96 .3V319.88a16.05 16.05 0 0 0-15.95-16l-96-.27a16 16 0 0 0-16.05 16v128.14H128V194.51L288 63.94l160 130.57z" class=""></path>
									</svg>
								</a>
							</li>
							<li data-page="Customers">
								<a href="<?php echo crm\Routes::url('clients'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Leads">
								<a href="<?php echo crm\Routes::url('leads'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
										<path fill="currentColor" d="M301.148 394.702l-79.2 79.19c-50.778 50.799-133.037 50.824-183.84 0-50.799-50.778-50.824-133.037 0-183.84l79.19-79.2a132.833 132.833 0 0 1 3.532-3.403c7.55-7.005 19.795-2.004 20.208 8.286.193 4.807.598 9.607 1.216 14.384.481 3.717-.746 7.447-3.397 10.096-16.48 16.469-75.142 75.128-75.3 75.286-36.738 36.759-36.731 96.188 0 132.94 36.759 36.738 96.188 36.731 132.94 0l79.2-79.2.36-.36c36.301-36.672 36.14-96.07-.37-132.58-8.214-8.214-17.577-14.58-27.585-19.109-4.566-2.066-7.426-6.667-7.134-11.67a62.197 62.197 0 0 1 2.826-15.259c2.103-6.601 9.531-9.961 15.919-7.28 15.073 6.324 29.187 15.62 41.435 27.868 50.688 50.689 50.679 133.17 0 183.851zm-90.296-93.554c12.248 12.248 26.362 21.544 41.435 27.868 6.388 2.68 13.816-.68 15.919-7.28a62.197 62.197 0 0 0 2.826-15.259c.292-5.003-2.569-9.604-7.134-11.67-10.008-4.528-19.371-10.894-27.585-19.109-36.51-36.51-36.671-95.908-.37-132.58l.36-.36 79.2-79.2c36.752-36.731 96.181-36.738 132.94 0 36.731 36.752 36.738 96.181 0 132.94-.157.157-58.819 58.817-75.3 75.286-2.651 2.65-3.878 6.379-3.397 10.096a163.156 163.156 0 0 1 1.216 14.384c.413 10.291 12.659 15.291 20.208 8.286a131.324 131.324 0 0 0 3.532-3.403l79.19-79.2c50.824-50.803 50.799-133.062 0-183.84-50.802-50.824-133.062-50.799-183.84 0l-79.2 79.19c-50.679 50.682-50.688 133.163 0 183.851z" class=""></path>
									</svg>
								</a>
							</li>
							<li data-page="Projects">
								<a href="<?php echo crm\Routes::url('projects'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="list-ul" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M506 114H134a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h372a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm6 154v-24a6 6 0 0 0-6-6H134a6 6 0 0 0-6 6v24a6 6 0 0 0 6 6h372a6 6 0 0 0 6-6zm0 160v-24a6 6 0 0 0-6-6H134a6 6 0 0 0-6 6v24a6 6 0 0 0 6 6h372a6 6 0 0 0 6-6zM48 60c-19.882 0-36 16.118-36 36s16.118 36 36 36 36-16.118 36-36-16.118-36-36-36zm0 160c-19.882 0-36 16.118-36 36s16.118 36 36 36 36-16.118 36-36-16.118-36-36-36zm0 160c-19.882 0-36 16.118-36 36s16.118 36 36 36 36-16.118 36-36-16.118-36-36-36z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Invoices">
								<a href="<?php echo crm\Routes::url('invoices'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-invoice" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M312 416h-80c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8h80c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zM64 240v96c0 8.84 8.19 16 18.29 16h219.43c10.1 0 18.29-7.16 18.29-16v-96c0-8.84-8.19-16-18.29-16H82.29C72.19 224 64 231.16 64 240zm32 16h192v64H96v-64zM72 96h112c4.42 0 8-3.58 8-8V72c0-4.42-3.58-8-8-8H72c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8zm0 64h112c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8H72c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8zm297.9-62.02L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99V131.97c0-12.69-5.1-24.99-14.1-33.99zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v304.01z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Proposals">
								<a href="<?php echo crm\Routes::url('proposals'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="file-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zm-48-244v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Expenses">
								<a href="<?php echo crm\Routes::url('expenses'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sack-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M334.89 121.63l43.72-71.89C392.77 28.47 377.53 0 352 0H160.15c-25.56 0-40.8 28.5-26.61 49.76l43.57 71.88C-9.27 240.59.08 392.36.08 412c0 55.23 49.11 100 109.68 100h292.5c60.58 0 109.68-44.77 109.68-100 0-19.28 8.28-172-177.05-290.37zM160.15 32H352l-49.13 80h-93.73zM480 412c0 37.49-34.85 68-77.69 68H109.76c-42.84 0-77.69-30.51-77.69-68v-3.36c-.93-59.86 20-173 168.91-264.64h110.1C459.64 235.46 480.76 348.94 480 409zM285.61 310.74l-49-14.54c-5.66-1.62-9.57-7.22-9.57-13.68 0-7.86 5.76-14.21 12.84-14.21h30.57a26.78 26.78 0 0 1 13.93 4 8.92 8.92 0 0 0 11-.75l12.73-12.17a8.54 8.54 0 0 0-.65-13 63.12 63.12 0 0 0-34.17-12.17v-17.6a8.68 8.68 0 0 0-8.7-8.62H247.2a8.69 8.69 0 0 0-8.71 8.62v17.44c-25.79.75-46.46 22.19-46.46 48.57 0 21.54 14.14 40.71 34.38 46.74l49 14.54c5.66 1.61 9.58 7.21 9.58 13.67 0 7.87-5.77 14.22-12.84 14.22h-30.61a26.72 26.72 0 0 1-13.93-4 8.92 8.92 0 0 0-11 .76l-12.84 12.06a8.55 8.55 0 0 0 .65 13 63.2 63.2 0 0 0 34.17 12.17v17.55a8.69 8.69 0 0 0 8.71 8.62h17.41a8.69 8.69 0 0 0 8.7-8.62V406c25.68-.64 46.46-22.18 46.57-48.56.02-21.5-14.13-40.67-34.37-46.7z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Staff">
								<a href="<?php echo crm\Routes::url('staff'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="users-class" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M544 224c-44.2 0-80 35.8-80 80s35.8 80 80 80 80-35.8 80-80-35.8-80-80-80zm0 128c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm-304-48c0 44.2 35.8 80 80 80s80-35.8 80-80-35.8-80-80-80-80 35.8-80 80zm128 0c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zM96 384c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm468 160h-40c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zm-448 0H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zm224 0h-40c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM64 48c0-8.83 7.19-16 16-16h480c8.81 0 16 7.17 16 16v149.22c11.51 3.46 22.37 8.36 32 15.11V48c0-26.47-21.53-48-48-48H80C53.53 0 32 21.53 32 48v164.33c9.63-6.75 20.49-11.64 32-15.11V48z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Tickets">
								<a href="<?php echo crm\Routes::url('tickets'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28zm7.67-24h-16c-6.627 0-12-5.373-12-12v-.381c0-70.343 77.44-63.619 77.44-107.408 0-20.016-17.761-40.211-57.44-40.211-29.144 0-44.265 9.649-59.211 28.692-3.908 4.98-11.054 5.995-16.248 2.376l-13.134-9.15c-5.625-3.919-6.86-11.771-2.645-17.177C185.658 133.514 210.842 116 255.67 116c52.32 0 97.44 29.751 97.44 80.211 0 67.414-77.44 63.849-77.44 107.408V304c0 6.627-5.373 12-12 12zM256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8z" class=""></path></svg>
								</a>
							</li>
							<li data-page="Tasks">
								<a href="<?php echo crm\Routes::url('tasks'); ?>">
									<svg  aria-hidden="true" focusable="false" data-prefix="fal" data-icon="tasks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M506 114H198c-3.3 0-6-2.7-6-6V84c0-3.3 2.7-6 6-6h308c3.3 0 6 2.7 6 6v24c0 3.3-2.7 6-6 6zm6 154v-24c0-3.3-2.7-6-6-6H198c-3.3 0-6 2.7-6 6v24c0 3.3 2.7 6 6 6h308c3.3 0 6-2.7 6-6zm0 160v-24c0-3.3-2.7-6-6-6H198c-3.3 0-6 2.7-6 6v24c0 3.3 2.7 6 6 6h308c3.3 0 6-2.7 6-6zM68.4 376c-19.9 0-36 16.1-36 36s16.1 36 36 36 35.6-16.1 35.6-36-15.7-36-35.6-36zM170.9 42.9l-7.4-7.4c-4.7-4.7-12.3-4.7-17 0l-78.8 79.2-38.4-38.4c-4.7-4.7-12.3-4.7-17 0l-8.9 8.9c-4.7 4.7-4.7 12.3 0 17l54.3 54.3c4.7 4.7 12.3 4.7 17 0l.2-.2L170.8 60c4.8-4.8 4.8-12.4.1-17.1zm.4 160l-7.4-7.4c-4.7-4.7-12.3-4.7-17 0l-78.8 79.2-38.4-38.4c-4.7-4.7-12.3-4.7-17 0L4 245.2c-4.7 4.7-4.7 12.3 0 17l54.3 54.3c4.7 4.7 12.3 4.7 17 0l-.2-.2 96.3-96.3c4.6-4.8 4.6-12.4-.1-17.1z" class=""></path></svg>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="header">
				
				<div class="wrapper">
					
					<div class="row clearfix">

						<div class="leftContainer">
							
							<div class="menu">
								
								<nav>
									
									<ul>
										
										<li><a href="<?php echo crm\Routes::url('expenses'); ?>">Accounts</a></li>
										<li><a href="<?php echo crm\Routes::url('services'); ?>">Services</a></li>
										<li><a href="<?php echo crm\Routes::url('calendar'); ?>">Calendar</a></li>
										<li><a href="<?php echo crm\Routes::url('crm/settings#reports'); ?>">Reports</a></li>

									</ul>

								</nav>

							</div>

						</div>
						
						<div class="rightContainer">
							
							<div class="row clearfix">

								<div class="time">
									<p></p>
								</div>
								
								<div class="search">
									<form action="#!">
										<div class="row clearfix">
											<div class="icon">
												<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z" class=""></path></svg>
											</div>
											<div class="searchBox">
												<input type="text" placeholder="Search...">
											</div>
										</div>
									</form>
									<div class="results"></div>
								</div>
								<div class="settings">
									<a href="#!" class="showNotificationDropdown">
										<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 480c-17.66 0-32-14.38-32-32.03h-32c0 35.31 28.72 64.03 64 64.03s64-28.72 64-64.03h-32c0 17.65-14.34 32.03-32 32.03zm209.38-145.19c-27.96-26.62-49.34-54.48-49.34-148.91 0-79.59-63.39-144.5-144.04-152.35V16c0-8.84-7.16-16-16-16s-16 7.16-16 16v17.56C127.35 41.41 63.96 106.31 63.96 185.9c0 94.42-21.39 122.29-49.35 148.91-13.97 13.3-18.38 33.41-11.25 51.23C10.64 404.24 28.16 416 48 416h352c19.84 0 37.36-11.77 44.64-29.97 7.13-17.82 2.71-37.92-11.26-51.22zM400 384H48c-14.23 0-21.34-16.47-11.32-26.01 34.86-33.19 59.28-70.34 59.28-172.08C95.96 118.53 153.23 64 224 64c70.76 0 128.04 54.52 128.04 121.9 0 101.35 24.21 138.7 59.28 172.08C421.38 367.57 414.17 384 400 384z" class=""></path></svg>
									</a>
								</div>
								<div class="add">
									<ul>
										<li>
											<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path fill="currentColor" d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z" class=""></path>
											</svg>
											<div class="addContainer">
												<ul>
													<li><a href="#!" data-modal="addNewClient" class="ismodal">Add Client</a></li>
													<li><a href="#!" data-modal="addNewProject" class="ismodal">Add Project</a></li>
													<li><a href="#!" data-modal="addNewExpense" class="ismodal">Add Expense</a></li>
													<li><a href="#!" data-modal="addNewInvoice" class="ismodal">Add Invoice</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
								<div class="userProfile">
									
									<ul class="clearfix">
										<li>
											<p>Hi, Uzair</p>
										</li>
										<li>
											<div class="userImage">
												<div class="inner" style="background-image: url(<?php echo crm\Users::getGravatar(crm\Sessions::get('studioUserLogin')->email) ?>)"></div>
											</div>
											<ul>
												<li><a href="#!" data-current-theme="<?php echo $theme; ?>" id="doDarkMode">Enable Dark Side</a></li>
												<li><a href="<?php echo crm\Routes::url('staff/member/' . crm\Sessions::get('studioUserLogin')->id); ?>">Staff Account</a></li>
												<li><a href="<?php echo crm\Routes::url('crm/settings'); ?>">CRM Settings</a></li>
												<li><a href="<?php echo crm\Routes::url('account/settings'); ?>">Account Settings</a></li>
												<li><a href="#!" id="dologout">Logout</a></li>
											</ul>
										</li>
									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="content">

				<div class="wrapper">
					