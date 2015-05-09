<script>
var globalVar;

function outerFn() 
{
	console.log('Outer function');
	function innerFn() 
	{
		console.log('Inner function');
	}
	globalVar = innerFn;
}

//outerFn();
//globalVar();
//!innerFn();
</script>

----

通过在父类函数中返回值来“营救”

<script>
function outerFn() 
{
	console.log('Outer function');
	function innerFn() 
	{
		console.log('Inner function');
	}
	return innerFn;
}
//var fnRef = outerFn();
//fnRef();
</script>

#### A.1.2 理解变量作用域
<script>
function outerFn() 
{
	function innerFn() 
	{
		var innerVar = 0;
		innerVar++;
		console.log('InnerVar = ' + innerVar);
	}
	return innerFn;
}
var fnRef = outerFn();
//fnRef();
//fnRef();
//
//var fnRef2 = outerFn();
//fnRef2();
//fnRef2();
</script>

内部函数引用全局变量
<script>
var globalVar = 0;
function outerFn() 
{
	function innerFn() 
	{
		globalVar++;
		console.log('globalVar = ' + globalVar);
	}
	return innerFn;
}
//var fnRef = outerFn();
//fnRef();
//fnRef();
//
//var fnRef2 = outerFn();
//fnRef2();
//fnRef2();
</script>

内部函数引用父函数的局部变量
<script>
function outerFn() 
{
	var outerVar = 0;
	function innerFn() 
	{
		outerVar++;
		console.log('outerVar = ' + outerVar);
	}
	return innerFn;
}
var fnRef = outerFn();
fnRef();
fnRef();

var fnRef2 = outerFn();
fnRef2();
fnRef2();
</script>










<?php
$a=['kuixy','go','a8'];
echo array_shift($a);
?>
<button class="a btn btn-primary">Go</button>
<button id="b" class="btn btn-primary">Copy</button>
<hr>
<form method="post">
	<input type="text" name="name" />
	<label><input type="radio" value="a" name="food" />Food A</label>
	<label><input type="radio" value="b" name="food" />Food B</label>

	<button type="submit">Go</button>
</form>
<?php
	if ($_POST) {
		K::printR($_POST);
	}
?>
<hr>
<div id="paste">
</div>
<div id="console"></div>
<script type="text/javascript"> 
$(function(){
	$('.a').on('click', function(){
		$('<p>gogo</p>').appendTo( $('#console') );
	});

	$('#b').click(function(){
		$.post('/blog/demo/ajax','',function(response){
			$(response.entity).appendTo($('#paste'));
		});
	});
});
</script>
