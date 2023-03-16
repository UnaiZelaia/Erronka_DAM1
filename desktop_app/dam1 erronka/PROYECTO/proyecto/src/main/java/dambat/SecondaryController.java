package dambat;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.ComboBox;
import model.Conexion;
import model.Rol;

public class SecondaryController implements Initializable{
    //componentes interfaz grafica
    @FXML
    private ComboBox<Rol> tablaName;
    private ObservableList<Rol> listaRol;
    private Conexion conexion;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        conexion = new Conexion();
        conexion.establecerConexion();
        listaRol = FXCollections.observableArrayList();        
        Rol.llenarInfo(conexion.getConnection(), listaRol);
        tablaName.setItems(listaRol);
        
        conexion.cerrarConexion();
    }

}
