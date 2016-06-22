<?php

function sendContact()
{
	$inputs = $_POST;
	$form_id = (int)str_replace('form_', '', $inputs['odin_form_action']);
	unset($inputs['action']);
	unset($inputs['odin_form_action']);

	$curl = new \Curl\Curl();
	$theForm = $curl->get(PIPA_API_URL.'form', [
		'form_id' => $form_id,
		'api_key' => PIPA_API_KEY
	]);
	if(!is_null($theForm))
	{
		$to = $theForm->to;
		$fields = ['to' => $to];
		foreach($theForm->inputs as $input)
		{
			if(isset($inputs[$input->id_name]))
			{
				$fields[$input->id_name] = [
					'name' => $input->name,
					'value' => $inputs[$input->id_name]
				];
			}
		}

		$curl = new \Curl\Curl();
		$result = $curl->post(PIPA_API_URL.'form', $fields);

		header('Content-Type: application/json');
		echo json_encode( array('response' => true, 'result' => $result) );
	}
	else
	{
		header('Content-Type: application/json');
		http_response_code(404);
		echo json_encode( array('response' => false, 'error' => 'Form not found') );
	}
	die;
}

add_action('wp_ajax_sendContact', 'sendContact');
add_action('wp_ajax_nopriv_sendContact', 'sendContact');

function contact_form($form_id) {
	if($form_id > 0):
		$curl = new \Curl\Curl();
		$theForm = $curl->get(PIPA_API_URL.'form', [
			'form_id' => $form_id,
			'api_key' => PIPA_API_KEY
		]);
		$form = new Odin_Contact_Form(
			'form_'.$theForm->id, // ID do formulário
			$theForm->to // E-mail do destinatário.
			//array( 'vc@email.com', 'tu@email.com' ), // array com e-mails que receberão cópia.
			//array( 'alguem@email.com' ) // array com e-mails que receberão cópia oculta.
			// array( 'class' => 'form' ) // array com atributos para o formulário.
			// 'file' // string com método que será enviado o anexo, no caso 'file' como anexo e 'url' para enviar links.
		);
		$fields = [];

		foreach($theForm->inputs as $input)
		{
			$row = [];
			$row['id'] = $input->id_name;
			$row['type'] = $input->type->code;
			if(!is_null($input->required) && $input->required !== '')
			{
				$row['required'] = true;
			}
			$row['label'] = [];
			$row['label']['text'] = $input->name;
			$row['label']['class'] = '';
			$row['attributes'] = [];
			$row['attributes']['placeholder'] = $input->placeholder;
			$row['attributes']['rules'] = $input->required;

			if($row['type'] == 'select' || $row['type'] == 'radio')
			{
				$row['options'] = [];
				$input->items = explode(PHP_EOL, $input->items);
				foreach($input->items as $selectItem)
				{
					$row['options'][$selectItem] = $selectItem;
				}
			}

			$fields[] = $row;
		}

		$form->set_fields(array(array( 'fields' => $fields)));
		return $form;
	endif;
}
