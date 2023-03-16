package model;



public class AlergiasUsuarios{
	private Usuario idUsuario;
	private Alergias idAlergias;

	public AlergiasUsuarios(Usuario idUsuario, Alergias idAlergias) { 
		this.idUsuario = idUsuario;
		this.idAlergias = idAlergias;
	}

	//Metodos atributo: idUsuario
	public Usuario getIdUsuario() {
		return idUsuario;
	}
	public void setIdUsuario(Usuario idUsuario) {
		this.idUsuario = idUsuario;
	}
	//Metodos atributo: idAlergias
	public Alergias getIdAlergias() {
		return idAlergias;
	}
	public void setIdAlergias(Alergias idAlergias) {
		this.idAlergias = idAlergias;
	}
}