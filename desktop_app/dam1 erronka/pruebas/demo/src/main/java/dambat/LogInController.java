package dambat;

import java.io.IOException;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;


public class LogInController {
    @FXML private TextField eUser;
    @FXML private PasswordField ePass;

    @FXML
    private void logIn() throws IOException {
        String email = eUser.getText();
        String pass = ePass.getText();

        if(email.equals("admin") && pass.equals("123")){
            // Si el usuario ha iniciado sesión correctamente, redirigir al usuario a la pantalla "CreateTransaction"
            App.setRoot("Menu");
        }else{
            // Si el usuario no ha iniciado sesión correctamente, mostrar una alerta con un mensaje de error
            Alert mensaje = new Alert(AlertType.ERROR);
            mensaje.setTitle("Error");
            mensaje.setContentText("El usuario o la contraseña son incorrectos.");
            mensaje.setHeaderText("Error de inicio de sesión");
            mensaje.showAndWait();
        }
    }
}