package model;

import java.util.Date;

import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;



public class Usuario{
	private IntegerProperty idUsuario;
	private StringProperty nombreUsuario;
	private StringProperty apellidoUsuario;
	private StringProperty emailUsuario;
	private StringProperty username;
	private Date fechaNacimiento;
	private Rol idRol;

	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
String emailUsuario, String username, Date fechaNacimiento, 
Rol idRol) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.username = new SimpleStringProperty(username);
		this.fechaNacimiento = fechaNacimiento;
		this.idRol = idRol;
	}

	//Metodos atributo: idUsuario
	public int getIdUsuario() {
		return idUsuario.get();
	}
	public void setIdUsuario(int idUsuario) {
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
	}
	public IntegerProperty IdUsuarioProperty() {
		return idUsuario;
	}
	//Metodos atributo: nombreUsuario
	public String getNombreUsuario() {
		return nombreUsuario.get();
	}
	public void setNombreUsuario(String nombreUsuario) {
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
	}
	public StringProperty NombreUsuarioProperty() {
		return nombreUsuario;
	}
	//Metodos atributo: apellidoUsuario
	public String getApellidoUsuario() {
		return apellidoUsuario.get();
	}
	public void setApellidoUsuario(String apellidoUsuario) {
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
	}
	public StringProperty ApellidoUsuarioProperty() {
		return apellidoUsuario;
	}
	//Metodos atributo: emailUsuario
	public String getEmailUsuario() {
		return emailUsuario.get();
	}
	public void setEmailUsuario(String emailUsuario) {
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
	}
	public StringProperty EmailUsuarioProperty() {
		return emailUsuario;
	}
	//Metodos atributo: username
	public String getUsername() {
		return username.get();
	}
	public void setUsername(String username) {
		this.username = new SimpleStringProperty(username);
	}
	public StringProperty UsernameProperty() {
		return username;
	}
	//Metodos atributo: fechaNacimiento
	public Date getFechaNacimiento() {
		return fechaNacimiento;
	}
	public void setFechaNacimiento(Date fechaNacimiento) {
		this.fechaNacimiento = fechaNacimiento;
	}
	//Metodos atributo: idRol
	public Rol getIdRol() {
		return idRol;
	}
	public void setIdRol(Rol idRol) {
		this.idRol = idRol;
	}

	//metodos agregar eliminar...

	public void guardarRegistro(){

	}

	public void actualizarRegistro(){
		
	}

	public void eliminarRegistro(){
		
	}
}