class ListaDoble{
	constructor(){
		this.cabeza = null;
	}
	getCabeza(){
		return this.cabeza;
	}
	setCabeza(cabeza){
		this.cabeza = cabeza;
	}
	agregar(reservar){
		var temp = new Nodo(reservar);
		var aux = this.cabeza;
		if(aux != null){
			while(aux.getSig() != null){
				aux = aux.getSig();
			}
			aux.setSig(temp);
		}else{
			this.cabeza = temp;
		}
	}
	imprimirTitulo(paso){
		var titulo = '';
		var aux = this.cabeza;
		switch(paso){
			case 1:
				return aux.getDato().getTitulo();
			case 2:
				return aux.getSig().getDato().getTitulo();
		}
	}
}
class Nodo{
	constructor(dato){
		this.dato = dato;
		this.ant = null;
		this.sig = null;
	}
	getDato(){
		return this.dato;
	}
	setDato(dato){
		this.dato = dato;
	}
	getAnt(){
		return this.ant;
	}
	setAnt(ant){
		this.ant = ant;
	}
	getSig(){
		return this.sig;
	}
	setSig(sig){
		this.sig = sig;
	}
}
class Reservar{
	constructor(titulo, contenido, botones){
		this.titulo = titulo;
		this.contenido = contenido;
		this.botones = botones;
	}
	getTitulo(){
		return this.titulo;
	}
	setTitulo(titulo){
		this.titulo = titulo;
	}
	getContenido(){
		return this.contenido;
	}
	setContenido(contenido){
		this.contenido = contenido;
	}
	getBotones(){
		return this.botones;
	}
	setBotones(botones){
		this.botones = botones;
	}
}

