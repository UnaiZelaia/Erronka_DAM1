package model;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

public class Alergias{
	private IntegerProperty idAlergias;
	private StringProperty descripcionAlergias;

	public Alergias(int idAlergias, String descripcionAlergias) { 
		this.idAlergias = new SimpleIntegerProperty(idAlergias);
		this.descripcionAlergias = new SimpleStringProperty(descripcionAlergias);
	}

	//Metodos atributo: idAlergias
	public int getIdAlergias() {
		return idAlergias.get();
	}
	public void setIdAlergias(int idAlergias) {
		this.idAlergias = new SimpleIntegerProperty(idAlergias);
	}
	public IntegerProperty IdAlergiasProperty() {
		return idAlergias;
	}
	//Metodos atributo: descripcionAlergias
	public String getDescripcionAlergias() {
		return descripcionAlergias.get();
	}
	public void setDescripcionAlergias(String descripcionAlergias) {
		this.descripcionAlergias = new SimpleStringProperty(descripcionAlergias);
	}
	public StringProperty DescripcionAlergiasProperty() {
		return descripcionAlergias;
	}
}
