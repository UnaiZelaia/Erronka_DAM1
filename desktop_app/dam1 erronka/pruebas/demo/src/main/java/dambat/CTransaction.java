package dambat;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.cell.PropertyValueFactory;
import model.Conexion;
import model.Usuario;

public class CTransaction implements Initializable{
    //columnas
    @FXML private TableColumn<Usuario, String> clmNombre;
    @FXML private TableColumn<Usuario, String> clmApellido;
    @FXML private TableColumn<Usuario, Double> clmBalance; 
    //componentes interfaz grafica
        //Text
    @FXML private TextField tNombre;
    @FXML private TextField tApellido;
    @FXML private TextField tMony;

    @FXML private TableView<Usuario> tablaUsuario;
    //listas
    @FXML private ObservableList<Usuario> listaUs;
    private Conexion conexion;
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        conexion = new Conexion();
        conexion.establecerConexion();
        //iniciar listas
        listaUs = FXCollections.observableArrayList();
        //llenar listas
        Usuario.llenarTablaUsuario(conexion.getConnection(), listaUs);
        //enlazar listas y Tableview
        tablaUsuario.setItems(listaUs);

        //enlazar columnas con atributos
        clmNombre.setCellValueFactory(new PropertyValueFactory<Usuario, String>("nombreUsuario"));
        clmApellido.setCellValueFactory(new PropertyValueFactory<Usuario, String>("apellidoUsuario"));
        clmBalance.setCellValueFactory(new PropertyValueFactory<Usuario, Double>("balance"));
        gestionarEventos();
        conexion.cerrarConexion();
    }

    @FXML
    public void gestionarEventos(){
        tablaUsuario.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<Usuario>() {

            @Override
            public void changed(ObservableValue<? extends Usuario> arg0, Usuario valorAnterior, Usuario valorSeleccionado) {
                String strMony = Double.toString(valorSeleccionado.getBalance());
                tNombre.setText(valorSeleccionado.getNombreUsuario());
                tApellido.setText(valorSeleccionado.getApellidoUsuario());
                tMony.setText(strMony);
            }
            
        });
    }
     @FXML
     public void actualizarRegistro(){
       
        Usuario u = new Usuario(tNombre.getText(), tApellido.getText(), Double.valueOf(tMony.getText()));    
        conexion.establecerConexion();
        int resultado = u.actualizarRegistro(conexion.getConnection());
        conexion.cerrarConexion();
        if (resultado == 1){

            listaUs.set(tablaUsuario.getSelectionModel().getSelectedIndex(),u);   //para hacer que la lista se actualice automaticamente, funciona mal
            Alert mensaje = new Alert(AlertType.INFORMATION);
            mensaje.setTitle("updated user");
            mensaje.setContentText("The user has been updated successfully");
            mensaje.setHeaderText("Result:");
            mensaje.show();
            
        }

    }

    @FXML
    private void pasoPag() throws IOException {
        App.setRoot("Menu");
    }
}