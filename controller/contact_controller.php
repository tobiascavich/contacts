<?php

require $_SERVER['DOCUMENT_ROOT'].'/contacts/model/contact_model.php';

$model = new Contact_model();

switch($_REQUEST['module'])
{
	case 'getContacts':
		echo json_encode($model->getAll());
	break;
	case 'delete':
		echo $model->deleteContact($_REQUEST['id']);
	break;
	case 'add':
		echo $model->addContact($_REQUEST['name'],$_REQUEST['phone'],$_REQUEST['email']);
	break;
	case 'edit':
		echo json_encode($model->getContact($_REQUEST['id']));
	break;
	case 'update':
		echo $model->editContact($_REQUEST['name'],$_REQUEST['phone'],$_REQUEST['email'],$_REQUEST['id']);
	break;
}

?>