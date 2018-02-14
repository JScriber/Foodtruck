window.addEventListener('load', function(){
	var print = document.getElementById('print');
	if(print){
		print.addEventListener('click', function(){
			window.print();
		});
	}
});