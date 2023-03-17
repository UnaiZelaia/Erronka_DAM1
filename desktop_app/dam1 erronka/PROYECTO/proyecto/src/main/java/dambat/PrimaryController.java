package dambat;

import java.io.IOException;

import javafx.fxml.FXML;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;

public class PrimaryController {

    @FXML
    private TextField usuario;

    @FXML
    private TextField contraseña;

    @FXML
    Pane paneLog;

    @FXML
    Label contraseñaInc;

    @FXML
    private void switchToGestion() throws IOException {
        App.setRoot("secondary");
    }
/*
    @FXML
     private void login(){
        String elUsuario = "aimar";
        String laContraseña = "kk";

        String usu = usuario.getText();
        String con = contraseña.getText();


            if(elUsuario == usuario.getText() && laContraseña == contraseña.getText()){

                contraseñaInc.setText("Bien");
            }else{
                contraseñaInc.setText("Contraseña o usuario inconrrectos");
            }
        }


    } */
}

