<?php

namespace events;

use Closure as closure;

class dispatcher
{
	private $listeners = [ ];

	public function listen ( string $event, closure $callback )
	{
		$this->listeners [ $event ] [ ] = $callback;
	}

	public function fire ( string $event, array $payload = [ ] )
	{
		if ( $this->has ( $event ) )
			foreach ( $this->listeners [ $event ] as $listener )
				call_user_func_array ( $listener, $payload );
	}

	public function has ( string $event ) : bool
	{
		return ( array_key_exists ( $event, $this->listeners ) );
	}
}