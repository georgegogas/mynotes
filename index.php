<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>My Notes</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<link  rel="stylesheet" type="text/css" href="custom-css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #f7fbfc; padding-bottom: 80px; padding-top: 80px;">
	<div class="container">
		<h1>My Notes</h1>

		<!-- Add new note ~~~~~~~~~~~~~ -->
		<div class="row align-items-end">
			<a href="#" class="link ml-auto mr-4" data-toggle="modal" data-target="#addNoteModal"><i class="fa fa-plus-circle" style="font-size: 30px; margin-right: 10px; vertical-align: middle;"></i>Add New Note</a>
		</div>

		<!-- Filter form ~~~~~~~~~~~~~~~ -->
		<form>
			<div class="form-row ml-1 mt-5 mb-4">
				<div class="custom-control custom-radio custom-control-inline">
				  <input class="custom-control-input" type="radio" name="sortOption" id="sortBs" value="1">
				  <label class="custom-control-label blue" for="sortBs">Business</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input class="custom-control-input" type="radio" name="sortOption" id="sortPs" value="2">
				  <label class="custom-control-label purple" for="sortPs">Personal</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input class="custom-control-input" type="radio" name="sortOption" id="sortH" value="3">
				  <label class="custom-control-label orange" for="sortH">Health</label>
				</div>
			
				<select class="form-control col-md-2 ml-auto mr-2" style="text-align-last: right">
				  <option>Sort by: Newest</option>
				  <option>Sort by: Oldest</option>
				</select>
			</div>
		</form>

		<!-- Notes card grid ~~~~~~~~~~~~~~~ -->
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3" id="note-grid">
		  <div class="col mb-4">
		    <div class="card h-100" style="border-radius: 5%">
		      <div class="card-body">
		      	<div class="row align-items-end">
		      		<p class="text-muted ml-2">12 December, 2020 - 12:00 AM</p>
		      		<button class="btn btn-edit ml-auto mr-2 mb-2" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit"></i></button>
		      	</div>
		        <h5 class="card-title"><i class="fa fa-circle mr-1 mb-1" style="color: blue; font-size: 15px vertical-align: top"></i>Special title treatment</h5>
		        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<!-- Modal for add new note ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNote" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="border-bottom: 0; padding-left: 2rem; padding-left: 2rem; padding-top: 2rem; padding-bottom: 0rem;">
	        <h4 class="modal-title" id="exampleModalLabel">Add New Note</h4>
	      </div>
	      <div class="modal-body" style="padding: 1rem 2rem">
	        <form>
	            <div class="form-group">
	            	<input type="text" class="form-control bg-light" style="border: 0" id="addTitle" placeholder="Title..">
	            </div>
	            <div class="row ml-2 mb-3">
		          	<div class="custom-control custom-radio custom-control-inline">
						<input class="custom-control-input" type="radio" name="addOption" id="addBs" value="1">
						<label class="custom-control-label blue" for="addBs">Business</label>
				    </div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="addOption" id="addPs" value="2">
					  <label class="custom-control-label purple" for="addPs">Personal</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="addOption" id="addH" value="3">
					  <label class="custom-control-label orange" for="addH">Health</label>
					</div>
				</div>
	          	<div class="form-group">
	            	<textarea rows="6" class="form-control bg-light" style="border: 0" id="addDesc" placeholder="Description.."></textarea>
	          	</div>
	        </form>
	      </div>
	      <div class="modal-footer" style="border-top: 0; padding-right: 2rem; padding-left: 2rem;">
	        <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-save" id="save-btn">Save</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal for edit note ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="editNote" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="border-bottom: 0; padding-left: 2rem; padding-left: 2rem; padding-top: 2rem; padding-bottom: 0rem;">
	        <h4 class="modal-title" id="exampleModalLabel">Edit note</h4>
	      </div>
	      <div class="modal-body" style="padding: 1rem 2rem">
	        <form>
	            <div class="form-group">
	            	<input type="text" class="form-control bg-light" style="border: 0" id="editTitle">
	            </div>
	            <div class="row ml-2 mb-3">
		          	<div class="custom-control custom-radio custom-control-inline">
						<input class="custom-control-input" type="radio" name="editOption" id="editBs" value="1">
						<label class="custom-control-label blue" for="editBs">Business</label>
				    </div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="editOption" id="editPs" value="2">
					  <label class="custom-control-label purple" for="editPs">Personal</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="editOption" id="editH" value="3">
					  <label class="custom-control-label orange" for="editH">Health</label>
					</div>
				</div>
	          	<div class="form-group">
	            	<textarea rows="6" class="form-control bg-light" style="border: 0" id="editDesc"></textarea>
	          	</div>
	        </form>
	      </div>
	      <div class="modal-footer" style="border-top: 0; padding-right: 2rem; padding-left: 2rem;">
	        <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-save" id="edit-save-btn">Save</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- scripts for bootstrap and jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<!-- script for append html elements to card grid div -->
	<script type="text/javascript" src="js/populateIndex.js"></script>
	<script type="text/javascript" src="js/modalAddData.js"></script>
	<script type="text/javascript" src="js/modalEdditData.js"></script>
	<script type="text/javascript" src="js/modalEdditShow.js"></script>

</body>
</html>