package model;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

public class Menu{
	private IntegerProperty idMenu;
	private StringProperty tipo;
	private StringProperty nombre;

	public Menu(int idMenu, String tipo, String nombre) { 
		this.idMenu = new SimpleIntegerProperty(idMenu);
		this.tipo = new SimpleStringProperty(tipo);
		this.nombre = new SimpleStringProperty(nombre);
	}

	//Metodos atributo: idMenu
	public int getIdMenu() {
		return idMenu.get();
	}
	public void setIdMenu(int idMenu) {
		this.idMenu = new SimpleIntegerProperty(idMenu);
	}
	public IntegerProperty IdMenuProperty() {
		return idMenu;
	}
	//Metodos atributo: tipo
	public String getTipo() {
		return tipo.get();
	}
	public void setTipo(String tipo) {
		this.tipo = new SimpleStringProperty(tipo);
	}
	public StringProperty TipoProperty() {
		return tipo;
	}
	//Metodos atributo: nombre
	public String getNombre() {
		return nombre.get();
	}
	public void setNombre(String nombre) {
		this.nombre = new SimpleStringProperty(nombre);
	}
	public StringProperty NombreProperty() {
		return nombre;
	}
}