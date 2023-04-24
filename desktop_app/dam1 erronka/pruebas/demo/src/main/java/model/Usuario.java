package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;

import javafx.beans.property.DoubleProperty;
import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleDoubleProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.collections.ObservableList;



public class Usuario{
	public  IntegerProperty idUsuario;
	private StringProperty nombreUsuario;
	private StringProperty apellidoUsuario;
	private StringProperty emailUsuario;
	private LocalDate fechaNacimiento;
	private IntegerProperty idRol;
	private StringProperty password;
	private DoubleProperty balance;
	private StringProperty roleDesc;


	//constructor para visualizazr usuarios en tabla
	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
	String emailUsuario, LocalDate fechaNacimiento, 
	 Double balance, String role_desc) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.fechaNacimiento = fechaNacimiento;
		this.balance = new SimpleDoubleProperty(balance);
		this.roleDesc = new SimpleStringProperty(role_desc);
	}
	//constructor para CreateUsers
	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
	String emailUsuario, String password, LocalDate fechaNacimiento, 
	int idRol, Double balance) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.fechaNacimiento = fechaNacimiento;
		this.balance = new SimpleDoubleProperty(balance);
		this.password = new SimpleStringProperty(password);
		this.idRol = new SimpleIntegerProperty(idRol);
	}

	//constructor para ManageUsers
	public Usuario(int idUsuario, String nombreUsuario, String apellidoUsuario, 
	String emailUsuario, LocalDate fechaNacimiento, 
	 int idRol, Double balance) { 
		this.idUsuario = new SimpleIntegerProperty(idUsuario);
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.emailUsuario = new SimpleStringProperty(emailUsuario);
		this.fechaNacimiento = fechaNacimiento;
		this.balance = new SimpleDoubleProperty(balance);
		this.idRol = new SimpleIntegerProperty(idRol);
	}

	//constructor para Transactions
	public Usuario(String nombreUsuario, String apellidoUsuario, 
	Double balance) { 
		this.nombreUsuario = new SimpleStringProperty(nombreUsuario);
		this.apellidoUsuario = new SimpleStringProperty(apellidoUsuario);
		this.balance = new SimpleDoubleProperty(balance);
	}

		//constructor para Delete
		public Usuario(int idUsuario) { 
			this.idUsuario = new SimpleIntegerProperty(idUsuario);
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
	
	//Metodos atributo: fechaNacimiento
	public LocalDate getFechaNacimiento() {
		return fechaNacimiento;
	}
	public void setFechaNacimiento(LocalDate fechaNacimiento) {
		this.fechaNacimiento = fechaNacimiento;
	}
	//Metodos atributo: idRol
	public IntegerProperty getidRol() {
		return idRol;
	}
	public void setidRol(int idRol) {
		this.idRol = new SimpleIntegerProperty(idRol);
	}
	public IntegerProperty IdRolProperty() {
		return idRol;
	}
	//Metodos atributo: apellidoUsuario
	public String getPassword() {
		return password.get();
	}
	public void setPassword(String password) {
		this.apellidoUsuario = new SimpleStringProperty(password);
	}
	public StringProperty PasswordProperty() {
		return password;
	}

	//Metodos atributo: Rol Desc
	public String getRoleDesc() {
		return roleDesc.get();
	}
	public void setRoleDesc(String role_desc) {
		this.roleDesc = new SimpleStringProperty(role_desc);
	}
	public StringProperty RoleDescProperty() {
		return roleDesc;
	}


	//metodos agregar eliminar...

	public int nuevoRegistro(Connection connection){
		try {
			PreparedStatement instruccion = connection.prepareStatement("INSERT INTO user (name, surname, email, hash_password, birthdate, id_role, balance) VALUES (?, ?, ?, ?, ?, ?, ?)"); //evita injeccion sql al enviar datos de esta forma y no con statement
			
			instruccion.setString(1, nombreUsuario.get());
			instruccion.setString(2, apellidoUsuario.get());
			instruccion.setString(3, emailUsuario.get());
			instruccion.setString(4, password.get());
			instruccion.setDate(5, java.sql.Date.valueOf(fechaNacimiento));
			instruccion.setInt(6,idRol.get());
			instruccion.setDouble(7,balance.get());
			return instruccion.executeUpdate();

		} catch (SQLException e) {
			e.printStackTrace();
			return 0;
		} 
	}

	public int actualizarRegistro(Connection connection){
		try {
			PreparedStatement instruccion = connection.prepareStatement("UPDATE user SET name = ?, surname = ?, email = ?, birthdate = ?, id_role = ?, balance = ? WHERE user.id_user = ?");
			/* ResultSet resultado = instruccion.executeQuery("SELECT id_user, name, surname, email, birthdate, balance, r.role_desc FROM user INNER JOIN role r ON user.id_role = r.id_role"); */
			
			instruccion.setString(1, nombreUsuario.get());
			instruccion.setString(2, apellidoUsuario.get());
			instruccion.setString(3, emailUsuario.get());
			instruccion.setDate(4, java.sql.Date.valueOf(fechaNacimiento));
			instruccion.setInt(5,idRol.get()); 
			instruccion.setDouble(6,balance.get());
			instruccion.setInt(7,idUsuario.get());
			return instruccion.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
			return 0;
		}
		
	}

	public int eliminarRegistro(Connection connection){
		try {
			PreparedStatement instruccion = connection.prepareStatement("DELETE FROM user WHERE user.id_user = ?;"); //evita injeccion sql al enviar datos de esta forma y no con statement
			
			instruccion.setInt(1,idUsuario.get());
	
			return instruccion.executeUpdate();

		} catch (SQLException e) {
			e.printStackTrace();
			return 0;
		} 
	}

	public static void llenarTablaUsuario(Connection connection, ObservableList<Usuario>tablaUsuario){
		try {
			Statement instruccion = connection.createStatement();
			ResultSet resultado = instruccion.executeQuery("SELECT id_user, name, surname, email, birthdate, balance, r.role_desc FROM user INNER JOIN role r ON user.id_role = r.id_role");

			while(resultado.next()){
				tablaUsuario.add(new Usuario(resultado.getInt("id_user"), resultado.getString("name"), resultado.getString("surname"), resultado.getString("email"), resultado.getDate("birthdate").toLocalDate(), resultado.getDouble("balance"), resultado.getString("role_desc")));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}