package dambat;

import java.io.IOException;
import java.sql.Date;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;
import model.Conexion;
import model.Usuario;

public class CUsersController {

    @FXML private TextField tId;
    @FXML private TextField tNombre;
    @FXML private TextField tApellido;
    @FXML private TextField tEmail;
    @FXML private TextField tPassword;
    @FXML private TextField tNumber;
    @FXML private DatePicker tEdad;
    @FXML private TextField tMony;
    @FXML private TextField tRol;
    private Conexion conexion;

    public void nuevoRegistro(){
        conexion = new Conexion();
        conexion.establecerConexion();
        //crear nuevo usuario llama al metodo nuevoRe0gistro
        Usuario u = new Usuario(0, tNombre.getText(), tApellido.getText(), tEmail.getText(), tPassword.getText(), Integer.valueOf(tNumber.getText()), Date.valueOf(tEdad.getValue()), Integer.valueOf(tRol.getText()), Double.valueOf(tMony.getText()));

        //llama al metodo nuevoRe0gistro
        int resultado = u.nuevoRegistro(conexion.getConnection());
        conexion.cerrarConexion();
        if (resultado == 1){
            Alert mensaje = new Alert(AlertType.INFORMATION);
            mensaje.setTitle("added user");
            mensaje.setContentText("The user has been added successfully");
            mensaje.setHeaderText("Result:");
            mensaje.show();
            
        }

    }

    //https://youtu.be/okQPcjicm9E?t=2697


    @FXML
    private void switchToPrimary() throws IOException {
        App.setRoot("ManageUsers");
    }

}