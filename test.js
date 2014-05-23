$(document).ready(function(){
	$.get('./data/list.json', {}, function(res){
		var html="<ul>";
			console.log(res.list)
		for(var i in res.list) {
			html+= "<li>"+res.list[i].title+"</li>"
			+"<li>"+res.list[i].time+"</li>"
			+"<li>"+res.list[i].menu+"</li>"
			+"</ul><ul>";

		}
		html+="</ul>";
		$('div.post').append(html);
		console.log(html);
	}, 'json')
	.success(function() { alert("second success"); })
	.error(function(a, b) { console.log(b) })
})

