namespace Phpoop;

class Php
{
	protected value;

	public function Php( var value ) {
		let this->value = value;
	}

	public function each( var callback ) {
		var k,v;

		for k, v in this->value {
			{callback}( k, v );
		}

		return this;
	}

	public function print() {
		print_r( this->value );
		return this;
	}

	public function uset( var index ) {
		unset( this->value[ index ] );
		return this;
	}

	public function sort( var flag = 0 ) {
		sort( this->value, flag );
		return this;
	}

	public function rev( var preserve_keys = 0 ) {
		array_reverse( this->value, preserve_keys);
		return this;
	}

	public function json( var a = 0 ) {
		if is_array( this->value ) { 
			let this->value = json_encode( this->value, a );
		} else {
			let this->value = json_decode( this->value, a );
		}
		
		return this;
	}

	public function get() {
		return this->value;
	}

	public function change( var callback ) {
		let this->value = {callback}( this->value );
		return this;
	}

	public function getContent() {
		let this->value = file_get_contents( this->value );
		return this;
	}

	public function chunk( var size, var preserve_keys = 0 ) {
		array_chunk( this->value, size, preserve_keys );
		return this;
	}

	public function trim() {
		trim( this->value );
		return this;
	}

	public function replace( var a, var b ) {
		str_replace( a, b, this->value );
		return this;
	}
}
