package model;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Date;

import javafx.beans.property.DoubleProperty;
import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleDoubleProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.collections.ObservableList;



public class Usuario{
	private IntegerProperty idUsuario;
	private StringProperty nombreUsuario;
	private StringProperty apellidoUsuario;
	private StringProperty emailUsuario;
	private StringProperty username;
	private Date fechaNacimiento;
	private IntegerProperty idRol;
	private DoubleProperty balance;
	private StringProperty role_desc;



	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
	String emailUsuario, String username, Date fechaNacimiento, 
	 Double balance, String role_desc) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.username = new SimpleStringProperty(username);
		this.fechaNacimiento = fechaNacimiento;
		this.balance = new SimpleDoubleProperty(balance);
		this.role_desc = new SimpleStringProperty(role_desc);
	}

	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
	String emailUsuario, Date fechaNacimiento, 
	int idRol) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.fechaNacimiento = fechaNacimiento;
		this.idRol = new SimpleIntegerProperty(idRol);
	}

	//Metodos atributo: balance
	public Double getBalance() {
		return balance.get();
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
	public IntegerProperty getidRol() {
		return idRol;
	}
	public void setidRol(int idRol) {
		this.idRol = new SimpleIntegerProperty(idRol);
	}

		//Metodos atributo: username
		public String getRoleDesc() {
			return role_desc.get();
		}
		public void setRoleDesc(String role_desc) {
			this.role_desc = new SimpleStringProperty(role_desc);
		}
		public StringProperty RoleDescProperty() {
			return role_desc;
		}


	//metodos agregar eliminar...

	public void guardarRegistro(){

	}

	public void actualizarRegistro(){
		
	}

	public void eliminarRegistro(){
		
	}

	public static void llenarTablaUsuario(Connection connection, ObservableList<Usuario>tablaUsuario){
		try {
			Statement instruccion = connection.createStatement();
			ResultSet resultado = instruccion.executeQuery("SELECT id_user, name, surname, email, username, birthdate, balance, r.role_desc FROM user INNER JOIN role r ON user.id_role = r.id_role");

			while(resultado.next()){
				tablaUsuario.add(new Usuario(resultado.getInt("id_user"), resultado.getString("name"), resultado.getString("surname"), resultado.getString("email"),  resultado.getString("username"), resultado.getDate("birthdate"), resultado.getDouble("balance"), resultado.getString("role_desc")));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}