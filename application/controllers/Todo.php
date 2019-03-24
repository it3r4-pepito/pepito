<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	
	public function index(){

		$this->load->model('todo_model');

		$data  = array(
			'todos' => $this->todo_model->get_todos()
		);
	
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/todolist',$data);
		$this->load->view('templates/footer');
	}



	public function addtodo(){
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/todoform');
		$this->load->view('templates/footer');
	}


	public function savetodo(){

		//$_SERVER
		if($this->input->server('REQUEST_METHOD') === 'POST'){


			$todo_title   = $this->input->post('todo_title');
			$todo_description  = $this->input->post('todo_description');

			$todo  = array(
				'title' => $todo_title,
				'description'  => $todo_description
			);
			$this->load->model('todo_model');
			$result   = $this->todo_model->save_todo($todo);
			if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}


		}else{
			echo "You cannot do GET here";
		}
	}

	public function update(){


		if($this->input->post('submit')){
			$id = $this->input->post('id');
			$update_title   = $this->input->post('update_title');
			$update_description  = $this->input->post('update_description');

			$todo  = array(
				
				'title' => $update_title,
				'description'  => $update_description
			);
			$this->load->model('todo_model');
			//$result   = $this->todo_model->fetch_single_data($id);
			$result   = $this->todo_model->update($id,$todo);
			
			if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}
		}
	}


	public function edit(){
		$this->load->model('todo_model');
		$id = $this->input->get('id');
		$data['datas'] = $this->todo_model->get_indi($id);
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/edit_todo',$data);
		$this->load->view('templates/footer');
}	
	public function view(){
		$this->load->model('todo_model');
		$id = $this->input->get('id');
		$data['datas'] = $this->todo_model->get_indi($id);
		$this->load->view('templates/header');
		$this->load->view('templates/nav.php');
		$this->load->view('todos/view',$data);
		$this->load->view('templates/footer');
}	












	public function delete(){
		$id = $this->input->get('id');
		$this->load->model('todo_model');
		$result = $this->todo_model->deleted($id);
		if($result > 0){
				//Query is success
				header('Location:  '    . base_url('todo'));
			}else{
				//Data not inserted
			}
		}

// 	public function viewdetails(){
// 		$id = $this->input->get('id');
// 		$this->load->model('todo_model');
// 			$data  = array(
// 			'todos' => $this->todo_model->get_todos()
// 		);
			
// 			$this->todo_model->viewd($id,$data);
// 		$this->load->view('templates/header');
// 		$this->load->view('templates/nav.php');
// 		$this->load->view('todos/view',$data);
// 		$this->load->view('templates/footer');
// }	

	

















	// public function edittodo(){
	// 	// $id=$this->url->segment(3);
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav.php');
	// 	$this->load->model("todo_model");
	// 	$data  = array(
	// 		'todos' => $this->todo_model->get_todos()
	// 	);
	// 	// $data["user_data"]=$this->todo_model->fetch_single_data($id);
	// 	// $data["fetch_data"]=$this->todo_model->get_todos();
	// 	$this->load->view('todos/todoedit',$data);
	// 	$this->load->view('templates/footer');
	// }
	// public function update(){
	// 	$data=array("title"=>$this->input->post("title"),
	// 				"description"=>$this->input->post("description"));
	// 	if($this->input->post('udapte')){
	// 		$this-> todo_model->update_data($data,$this->input->post("hidden_id"));
	// 		redirect(base_url()."/inserted");
	// 	}
	// 	if($this->input->post("insert")){
	// 		$this->main_model->insert_data($data);
	// 		header('Location:  '  .base_url('todo'));
	// 	}
	// }
	// public function edittodo(){
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/nav.php');
	// 	$this->load->model("todo_model");
	// 	$data=array();
	// 	$get=$this->uri->uri_to_assoc();
	// 	$data['result']=$this->todo_model->fetch_single_data1($get['id']);

	// 	$this->load->view('todo/edittodo',$data);
	// 	if($this->input->post("submit")){
	// 		$this->todo_model->fetch_single_data($get['id']);
	// 	}
	// 	$this->load->view('templates/footer');
	// }

}
