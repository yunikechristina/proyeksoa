<?php 
	require 'cekSession.php';
?>

	<script>
		$(document).ready(function() {
			$("#backUpload").click(function(){
				changePage("pilihanAssignAjax.php");
			});
		});
	</script>

	<div class="assignment" align="center">
		<h2>Upload Assignment</h2>
		  Due date :
		  <input type="date" name="duedate">
		  <input type="file" name="pic" accept=".txt,.ppt,.pptx,.doc,.docx">
		  <a href="assignment.php">
		  <button>Submit belum ajax</button>
		  </a>
		  <button id="backUpload">Back</button>
	</div>