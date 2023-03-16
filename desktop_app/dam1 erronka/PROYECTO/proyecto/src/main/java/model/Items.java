package model;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

public class Items{
	private IntegerProperty idItem;
	private StringProperty itemDescripcion;
	private IntegerProperty idAlergia;

	public Items(int idItem, String itemDescripcion, int idAlergia) { 
		this.idItem = new SimpleIntegerProperty(idItem);
		this.itemDescripcion = new SimpleStringProperty(itemDescripcion);
		this.idAlergia = new SimpleIntegerProperty(idAlergia);
	}

	//Metodos atributo: idItem
	public int getIdItem() {
		return idItem.get();
	}
	public void setIdItem(int idItem) {
		this.idItem = new SimpleIntegerProperty(idItem);
	}
	public IntegerProperty IdItemProperty() {
		return idItem;
	}
	//Metodos atributo: itemDescripcion
	public String getItemDescripcion() {
		return itemDescripcion.get();
	}
	public void setItemDescripcion(String itemDescripcion) {
		this.itemDescripcion = new SimpleStringProperty(itemDescripcion);
	}
	public StringProperty ItemDescripcionProperty() {
		return itemDescripcion;
	}
	//Metodos atributo: idAlergia
	public int getIdAlergia() {
		return idAlergia.get();
	}
	public void setIdAlergia(int idAlergia) {
		this.idAlergia = new SimpleIntegerProperty(idAlergia);
	}
	public IntegerProperty IdAlergiaProperty() {
		return idAlergia;
	}

}
