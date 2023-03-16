package model;


import java.util.Date;

public class Reserva{
	private Usuario idUsuario;
	private Menu idMenu;
	private Date fechaMenu;

	public Reserva(Usuario idUsuario, Menu idMenu, Date fechaMenu) { 
		this.idUsuario = idUsuario;
		this.idMenu = idMenu;
		this.fechaMenu = fechaMenu;
	}

	//Metodos atributo: idUsuario
	public Usuario getIdUsuario() {
		return idUsuario;
	}
	public void setIdUsuario(Usuario idUsuario) {
		this.idUsuario = idUsuario;
	}
	//Metodos atributo: idMenu
	public Menu getIdMenu() {
		return idMenu;
	}
	public void setIdMenu(Menu idMenu) {
		this.idMenu = idMenu;
	}
	//Metodos atributo: fechaMenu
	public Date getFechaMenu() {
		return fechaMenu;
	}
	public void setFechaMenu(Date fechaMenu) {
		this.fechaMenu = fechaMenu;
	}
}