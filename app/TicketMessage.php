<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
	protected $fillable=[
				'ticket_id',
				'description',
				'postby'
			];
}
