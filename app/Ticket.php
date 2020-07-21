<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{


	protected $fillable=[
				'ticketno',
				'userid',
				'invoice',
				'firstname',
				'lastname',
				'email',
				'phone',
				'subject',
				'status',
				'closed_reason',
				'closed_by',
			];

	public function Messages() {
	    return $this->hasMany('App\TicketMessage','ticket_id');
	}
}
