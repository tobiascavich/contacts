<script src="../contacts/js/contact.js"></script>
<h2>Contacts</h2>

<p>List of contacts <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#addModal">Add</button></p>

<p class="resultmsg"></p>

<table class="contactTable table">
	<thead>
		<th>name</th>
		<th>phone</th>
		<th>email</th>
		<th>actions</th>
	</thead>
	<tbody>	
	</tbody>
</table>

<!--ADD MODAL-->
<div id="addModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		    	<h3 id="myModalLabel">Add Contact</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    </div>
		    <form id="addContact" method="POST" action="<?=($_SERVER['PHP_SELF'])?>">
			    <div class="modal-body">
			        	<div class="form-group row">
				        	<label class="col-sm-2">Name</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="contactName" placeholder="Add contact name"/>
				    		</div>
			    		</div>
			    		<div class="form-group row">
				        	<label class="col-sm-2">Phone</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="contactPhone" placeholder="Add contact phone"/>
				    		</div>
			    		</div>
			    		<div class="form-group row">
				        	<label class="col-sm-2">Email</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="contactEmail" placeholder="Add contact email"/>
				    		</div>
			    		</div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			        <input type="submit" class="btn btn-primary" value="Save changes" />
			    </div>
			</form>
		</div>
	</div>
</div>

<!--EDIT MODAL-->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		    	<h3 id="myModalLabel">Edit Contact</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    </div>
		    <form id="editContact" method="POST" action="<?=($_SERVER['PHP_SELF'])?>">
		    	<input type="hidden" id="idHidden" name="idHidden"/>
			    <div class="modal-body">
			        	<div class="form-group row">
				        	<label class="col-sm-2">Name</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="editName" placeholder="Add contact name"/>
				    		</div>
			    		</div>
			    		<div class="form-group row">
				        	<label class="col-sm-2">Phone</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="editPhone" placeholder="Add contact phone"/>
				    		</div>
			    		</div>
			    		<div class="form-group row">
				        	<label class="col-sm-2">Email</label>
				        	<div class="col-sm-10">
				    			<input type="text" class="form-control" id="editEmail" placeholder="Add contact email"/>
				    		</div>
			    		</div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			        <input type="submit" class="btn btn-primary" value="Save changes" />
			    </div>
			</form>
		</div>
	</div>
</div>

