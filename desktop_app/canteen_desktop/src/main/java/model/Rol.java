package model;


import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.collections.ObservableList;

public class Rol{
	private IntegerProperty idRol;
	private StringProperty descripcionRol;

	public Rol(int idRol, String descripcionRol) { 
		this.idRol = new SimpleIntegerProperty(idRol);
		this.descripcionRol = new SimpleStringProperty(descripcionRol);
	}

	//Metodos atributo: idRol
	public int getIdRol() {
		return idRol.get();
	}
	public void setIdRol(int idRol) {
		this.idRol = new SimpleIntegerProperty(idRol);
	}
	public IntegerProperty IdRolProperty() {
		return idRol;
	}
	//Metodos atributo: descripcionRol
	public String getDescripcionRol() {
		return descripcionRol.get();
	}
	public void setDescripcionRol(String descripcionRol) {
		this.descripcionRol = new SimpleStringProperty(descripcionRol);
	}
	public StringProperty DescripcionRolProperty() {
		return descripcionRol;
	}

	public String toString(){
		return descripcionRol.get();
	}

	public static void llenarInfo(Connection connection, ObservableList<Rol> tablaName){
		try {
			Statement statement = connection.createStatement();
			ResultSet resultado = statement.executeQuery(
				"SELECT id_role, role_desc FROM role");
			while(resultado.next()){
				tablaName.add(new Rol(resultado.getInt("id_role"),resultado.getString("role_desc")));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}
