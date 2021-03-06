--TEST--
Bug #27504 (call_user_func_array allows calling of private/protected methods)
--FILE--
<?php
	class foo {
		function __construct () {
			$this->bar('1');
		}
		private function bar ( $param ) {
			echo 'Called function foo:bar('.$param.')'."\n";
		}
	}

	$foo = new foo();

	call_user_func_array( array( $foo , 'bar' ) , array( '2' ) );

	$foo->bar('3');
?>
--EXPECTF--
Called function foo:bar(1)
Warning: expects parameter 1 to be valid callback, cannot access in %s on line %d at pos %d

Fatal error: Call to private method foo::bar() from context '' in %s on line %d, position %d