package dambat;

import java.io.IOException;

import javafx.fxml.FXML;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;


public class MenuController {

    @FXML
    private void goCUsers() throws IOException {
            App.setRoot("CreateUsers");
    }

    @FXML
    private void goMUsers() throws IOException {
            App.setRoot("ManageUsers");
    }

    @FXML
    private void goTransaction() throws IOException {
            App.setRoot("CreateTransaction");  
    }
}



