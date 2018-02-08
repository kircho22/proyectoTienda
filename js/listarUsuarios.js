var productos = JSON.parse(sessionStorage.getItem('productos'));
var cont=0;
for (var index = 0; index < productos.length; index++){
	var e = productos[index];
	if(cont==0){
		var contenedor = document.createElement('div');
		$(contenedor).addClass('productosContainer');
	}
	var producto = document.createElement('div');
	$(producto).addClass('producto');
	var link = document.createElement('a');
	$(link).attr('href', 'producto.html?'+e.id);
	var imagenContainer = document.createElement('div');
	$(imagenContainer).addClass('imagenContainer');
	var imagen = document.createElement('img');
	$(imagen).attr('src', 'images/'+e.imagen);
	$(imagen).addClass('imagen');
	imagenContainer.append(imagen);
	link.append(imagenContainer);
	var nombre = document.createElement('p');
	$(nombre).addClass('nombre');
	$(nombre).text(e.nombre);
	link.append(nombre);
	var precio =  document.createElement('p');
	$(precio).addClass('precio');
	$(precio).html('Precio: <span>' + e.precio + '</span>');
	link.append(precio);
	producto.append(link);
	contenedor.append(producto);
	cont++;
	if(cont == 3){
		$('#masterContainer').append(contenedor);
		cont = 0;
	}
	
}