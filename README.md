# phpOop
phpOop


useage 

```php

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


__('["test","test1"]')->json()->change(function( $arr ) {
	unset( $arr[0] );
	return $arr;
})->print();
```

