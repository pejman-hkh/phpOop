<?

class php {

	function __construct( &$value ) {
		$this->value = $value;
	}

	function each( $callback ) {
		foreach( $this->value as $k => $v ) {
			$callback( $k, $v );
		}
		return $this;
	}

	function print() {
		print_r( $this->value );
		return $this;
	}

	function unset( $index ) {
		unset( $this->value[ $index ] );
		return $this;
	}

	function sort( $flag = SORT_REGULAR ) {
		sort( $this->value, $flag );
		return $this;
	}


	private function doIt( $callback, $params ) {
		$this->value = call_user_func_array( $callback, $params );
		return $this;
	}

	function reverse( $preserve_keys = false ) {
		return $this->doIt("array_reverse", [ $this->value, $preserve_keys ] );
	}

	function chunk( $size, $preserve_keys = false ) {
		return $this->doIt("array_chunk", [ $this->value, $size, $preserve_keys ] );
	}

	function trim() {
		return $this->doIt("trim", [ $this->value ] );
	}

	function replace( $a, $b ) {
		return $this->doIt("str_replace", [ $a, $b, $this->value ] );
	}

	function json( $a = false ) {
		return $this->doIt(is_array( $this->value ) ? "json_encode" : "json_decode", [ $this->value, $a ] );
	}
}

function __( $array ) {
	return new php( $array );
}

__([2,3,1,5])->sort()->print();


__([ "test1", "test", "test2", "test3" ])
->sort()->print()
->unset(0)
->reverse()->print()
->each(function( $k, $v ) {
	print_r( $v );
})
->chunk(2)->print();

__("string a ")->trim()->replace("a", "b")->print();
__([ 'test', 'test1' ])->json()->print();
__('["test","test1"]')->json()->print();

?>