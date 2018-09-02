<?php

require $_SERVER['DOCUMENT_ROOT'].'/contacts/system/database.php';

class Contact_model
{
	var $contact;

	function contact_model()
	{
		$this->contact = new Database();
	}

	function getAll()
	{
		$query = "
			SELECT 
				name,
				phone,
				email,
				conid
			FROM
				contact
		";

		return $this->contact->results($query);
	}

	function getContact($id)
	{
		$query = "
			SELECT 
				name,
				phone,
				email
			FROM
				contact
			WHERE
				conid = ".$id."
		";

		return $this->contact->results($query);		
	}

	function addContact($name,$phone,$email)
	{
		$query = "
			INSERT INTO 
				contact (name,phone,email)
			values 
				('".$name."','".$phone."','".$email."')";

		if($this->contact->query($query))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function editContact($name,$phone,$email,$id)
	{
		$query = "
			UPDATE 
				contact
			SET
				name = '".$name."',
				phone = '".$phone."',
				email = '".$email."'
			WHERE
				conid = ".$id."

		";
		
		if($this->contact->query($query))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function deleteContact($id)
	{
		$query = "
			DELETE FROM contact WHERE conid = ".$id."
		";

		if($this->contact->query($query))
		{
			return 'Register successfully deleted.';
		}
		else
		{
			return 'Ops! Something went wrong!';
		}
	}
}

?>