function execute (form) {
    if(form.Create.checked)
    	create(form);
    else if(form.Read.checked)
    	read(form);
    else if(form.Update.checked)
    	update(form);
    else if(form.Delete.checked)
    	del(form);
}

function create(form)	{
	$.ajax({
	  type: "POST",
	  url: "https://127.0.0.1/handle.php",
	  data: "request:'1', name:'"+form.name+"', address:'"+form.address+"', phone:'" + form.phone +"' "
	  success: success,
	});
	window.alert("Created")
}

function read(form)	{
	$.ajax({
	  type: "POST",
	  url: "https://127.0.0.1/handle.php",
	  data: "request:'2', name:'"+form.name
	  success: success,
	});
	window.alert("Read")
}

function update(form)	{
	$.ajax({
	  type: "POST",
	  url: "https://127.0.0.1/handle.php",
	  data: "request:'3', name:'"+form.name+"', address:'"+form.address+"', phone:'" + form.phone +"' "
	  success: success,
	});
	window.alert("updated")
}

function del(form)	{
	$.ajax({
	  type: "POST",
	  url: "https://127.0.0.1/handle.php",
	  data: "request:'4', name:'"+form.name
	  success: success,
	});
	window.alert("deleted")
}