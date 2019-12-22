<?php
    include 'db/db.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/froala_blocks.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
    <title>Ultimate Coder</title>
</head>
    <body>
        <header class="bg-dark" data-block-type="headers" data-id="2">
            <div class="container text-center">
                <nav class="navbar">
                    <a class="navbar-brand" href=""><img src="imgs/techno_logo.png" width="300" height="70"></a>
                    <div class="navbar-nav">
						<li class="nav-item">
							<button class="btn btn-light" id="submitTest" type="submit" form="quiz">Submit</button>
						</li>
                    </div>
                </nav>
            </div>
        </header>
        <section>
            <div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" ><span>Data Structure</span></a></li>
						<li><a href="#section-2" ><span>C/C++</span></a></li>
						<li><a href="#section-3" ><span>Java</span></a></li>
						<li><a href="#section-4" ><span>Python</span></a></li>
						<li><a href="#section-5" ><span>Algorithm</span></a></li>
					</ul>
				</nav>
				<form class="content" name="quiz"  id="quiz" action="quiz_attempt_script.php" method="POST">
					<section id="section-1">
						<div class="container my-3">
								<div id="test"  class="card-body">
									<?php
										$i = 0;
										$questions = "SELECT * FROM uc_question";
										$result = mysqli_query($conn,$questions);
										while ($row = mysqli_fetch_assoc($result)) {
											if($row['question_type'] == 1){
											echo "<div class='card my-3 mx-4'>
													<h5 class='card-header' style='font-size:25px;'>".$row['question']."</h5>
													<div class='card-body'>
														<div class='row'>
															<div class='mx-4 my-3 col-md-5'>
																<div class='row'>
																	<p><b>A.</b> ".$row['option_1']."</p>
																</div>
																<div class='row'>
																	<p><b>B.</b> ".$row['option_2']."</p>
																</div>
																<div class='row'>
																	<p><b>C.</b> ".$row['option_3']."</p>
																</div>
																<div class='row'>
																	<p><b>D.</b> ".$row['option_4']."</p>
																</div>
															</div>
															<div class='offset-2 col-md-3'>
																<div class='row'>
																	<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
																	<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
																		<option selected>Choose Answer...</option>
																		<option>A</option>
																		<option>B</option>
																		<option>C</option>
																		<option>D</option>
																	</select>
																</div>
															</div>
														</div>
														<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
														<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
														<input type='hidden' name='marks[]' value='".$row['question_mark']."'>
													</div>
												</div>";
											$i++;
											}
										}
									?>
									
									
								</div>
							</div>
					</section>
					<section id="section-2">
						<div class="container my-3">
								<div id="test"  class="card-body">
									<?php
										$i = 0;
										$questions2 = "SELECT * FROM uc_question";
										$result2 = mysqli_query($conn,$questions2);
										while ($row = mysqli_fetch_assoc($result2)) {
											if($row['question_type'] == 2){
											echo "<div class='card my-3 mx-4'>
													<h5 class='card-header' style='font-size:25px;'>".$row['question']."</h5>
													<div class='card-body'>
														<div class='row'>
															<div class='mx-4 my-3 col-md-5'>
																<div class='row'>
																	<p><b>A.</b> ".$row['option_1']."</p>
																</div>
																<div class='row'>
																	<p><b>B.</b> ".$row['option_2']."</p>
																</div>
																<div class='row'>
																	<p><b>C.</b> ".$row['option_3']."</p>
																</div>
																<div class='row'>
																	<p><b>D.</b> ".$row['option_4']."</p>
																</div>
															</div>
															<div class='offset-2 col-md-3'>
																<div class='row'>
																	<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
																	<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
																		<option selected>Choose Answer...</option>
																		<option>A</option>
																		<option>B</option>
																		<option>C</option>
																		<option>D</option>
																	</select>
																</div>
															</div>
														</div>
														<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
														<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
														<input type='hidden' name='marks[]' value='".$row['question_mark']."'>
													</div>
												</div>";
											$i++;
											}
										}
									?>
									
									
								</div>
							</div>
					</section>
					<section id="section-3">
						<div class="container my-3">
								<div id="test"  class="card-body">
									<?php
										$i = 0;
										$questions3 = "SELECT * FROM uc_question";
										$result3 = mysqli_query($conn,$questions3);
										while ($row = mysqli_fetch_assoc($result3)) {
											if($row['question_type'] == 3){
											echo "<div class='card my-3 mx-4'>
													<h5 class='card-header' style='font-size:25px;'>".$row['question']."</h5>
													<div class='card-body'>
														<div class='row'>
															<div class='mx-4 my-3 col-md-5'>
																<div class='row'>
																	<p><b>A.</b> ".$row['option_1']."</p>
																</div>
																<div class='row'>
																	<p><b>B.</b> ".$row['option_2']."</p>
																</div>
																<div class='row'>
																	<p><b>C.</b> ".$row['option_3']."</p>
																</div>
																<div class='row'>
																	<p><b>D.</b> ".$row['option_4']."</p>
																</div>
															</div>
															<div class='offset-2 col-md-3'>
																<div class='row'>
																	<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
																	<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
																		<option selected>Choose Answer...</option>
																		<option>A</option>
																		<option>B</option>
																		<option>C</option>
																		<option>D</option>
																	</select>
																</div>
															</div>
														</div>
														<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
														<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
														<input type='hidden' name='marks[]' value='".$row['question_mark']."'>
													</div>
												</div>";
											$i++;
											}
										}
									?>
								</div>
							</div>
					</section>
					<section id="section-4">
						<div class="container my-3">
								<div id="test"  class="card-body">
									<?php
										$i = 0;
										$questions4 = "SELECT * FROM uc_question";
										$result4 = mysqli_query($conn,$questions4);
										while ($row = mysqli_fetch_assoc($result4)) {
											if($row['question_type'] == 4){
											echo "<div class='card my-3 mx-4'>
													<h5 class='card-header' style='font-size:25px;'>".$row['question']."</h5>
													<div class='card-body'>
														<div class='row'>
															<div class='mx-4 my-3 col-md-5'>
																<div class='row'>
																	<p><b>A.</b> ".$row['option_1']."</p>
																</div>
																<div class='row'>
																	<p><b>B.</b> ".$row['option_2']."</p>
																</div>
																<div class='row'>
																	<p><b>C.</b> ".$row['option_3']."</p>
																</div>
																<div class='row'>
																	<p><b>D.</b> ".$row['option_4']."</p>
																</div>
															</div>
															<div class='offset-2 col-md-3'>
																<div class='row'>
																	<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
																	<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
																		<option selected>Choose Answer...</option>
																		<option>A</option>
																		<option>B</option>
																		<option>C</option>
																		<option>D</option>
																	</select>
																</div>
															</div>
														</div>
														<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
														<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
														<input type='hidden' name='marks[]' value='".$row['question_mark']."'>
													</div>
												</div>";
											$i++;
											}
										}
									?>
								</div>
							</div>
					</section>
					<section id="section-5">
						<div class="container my-3">
								<div id="test"  class="card-body">
									<?php
										$i = 0;
										$questions5 = "SELECT * FROM uc_question";
										$result5 = mysqli_query($conn,$questions5);
										while ($row = mysqli_fetch_assoc($result5)) {
											if($row['question_type'] == 5){
											echo "<div class='card my-3 mx-4'>
													<h5 class='card-header' style='font-size:25px;'>".$row['question']."</h5>
													<div class='card-body'>
														<div class='row'>
															<div class='mx-4 my-3 col-md-5'>
																<div class='row'>
																	<p><b>A.</b> ".$row['option_1']."</p>
																</div>
																<div class='row'>
																	<p><b>B.</b> ".$row['option_2']."</p>
																</div>
																<div class='row'>
																	<p><b>C.</b> ".$row['option_3']."</p>
																</div>
																<div class='row'>
																	<p><b>D.</b> ".$row['option_4']."</p>
																</div>
															</div>
															<div class='offset-2 col-md-3'>
																<div class='row'>
																	<label class='mr-sm-2' for='inlineFormCustomSelect'>Select Answer :</label>
																	<select class='custom-select mr-sm-5' id='inlineFormCustomSelect'  name='answer[]'>
																		<option selected>Choose Answer...</option>
																		<option>A</option>
																		<option>B</option>
																		<option>C</option>
																		<option>D</option>
																	</select>
																</div>
															</div>
														</div>
														<input type='hidden' name='question_id[]' value='".$row['question_id']."'>
														<input type='hidden' name='correct_option[]' value='".$row['correct_option']."'>
														<input type='hidden' name='marks[]' value='".$row['question_mark']."'>
													</div>
												</div>";
											$i++;
											}
										}
									?>
								</div>
							</div>
					</section>
				</form><!-- /content -->
			</div><!-- /tabs -->
        </section>
        <footer class="fdb-block footer-small bg-dark" data-block-type="footers" data-id="5">
            <div class="container">
                <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-right" style="z-index: 10000;"><p>© 2019 Ultimate-Coder Technovanza</p></div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
        <script src="js/cbp.js"></script>
        <script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
			window.onload=function(){ 
			//	window.setTimeout(document.quiz.submit.bind(document.quiz), (60000*10));
			};
		</script>
    </body>
</html>