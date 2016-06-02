<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;
use Illuminate\Http\Request;
use Mail;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class contacteController extends AppBaseController {

	// This function will show the view
	public function index()
	{
	return view('contacte');
	}

	public function store()
	{
		$input = Input::only('name', 'email', 'tel', 'msg');

		$validator = Validator::make($input,
		  array(
		      'name' => 'required',
		      'email' => 'required|email',
		      'tel' => 'optional',
		      'msg' => 'required',
		  )
		);

		if ($validator->fails())
		{
		  return Redirect::to('contacte')->with('errors', $validator->messages());
		} else { // the validation has not failed, it has passed
			
		// Send the email with the contactemail view, the user input
		Mail::send('contactemail', $input, function($message)
		{
		   $message->from('your@email.address', 'Your Name');

		   $message->to('your@email.address');
		});

		// Specify a route to go to after the message is sent to provide the user feedback
		return Redirect::to('thanks');
		}
	}
}