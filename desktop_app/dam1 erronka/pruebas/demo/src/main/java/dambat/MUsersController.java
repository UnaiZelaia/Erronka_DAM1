package dambat;

import java.io.IOException;
import java.net.URL;
import java.sql.Date;
import java.util.ResourceBundle;

import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.cell.PropertyValueFactory;
import model.Conexion;
import model.Rol;
import model.Usuario;

public class MUsersController implements Initializable{
    //columnas
    @FXML private TableColumn<Usuario, String> clmNombre;
    @FXML private TableColumn<Usuario, String> clmApellido;
    @FXML private TableColumn<Usuario, String> clmEmail;
    @FXML private TableColumn<Usuario, Date> clmfecha;
    @FXML private TableColumn<Usuario, String> clmIdRoll; 
    @FXML private TableColumn<Usuario, Double> clmBalance; 
    //componentes interfaz grafica
        //Text
    @FXML private TextField tId;
    @FXML private TextField tNombre;
    @FXML private TextField tApellido;
    @FXML private TextField tEmail;
    @FXML private TextField tUsername;
    @FXML private DatePicker tEdad;
    @FXML private TextField tMony;

    @FXML private ComboBox<Rol> tablaName;
    @FXML private TableView<Usuario> tablaUsuario;
    //listas
    @FXML private ObservableList<Rol> listaRol;
    @FXML private ObservableList<Usuario> listaUs;
    private Conexion conexion;

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        conexion = new Conexion();
        conexion.establecerConexion();
        //iniciar listas
        listaRol = FXCollections.observableArrayList();
        listaUs = FXCollections.observableArrayList();
        //llenar listas
        Usuario.llenarTablaUsuario(conexion.getConnection(), listaUs);
        Rol.llenarInfo(conexion.getConnection(), listaRol);
        //enlazar listas y Tableview
        tablaName.setItems(listaRol);
        tablaUsuario.setItems(listaUs);

        //enlazar columnas con atributos
        clmNombre.setCellValueFactory(new PropertyValueFactory<Usuario, String>("nombreUsuario"));
        clmApellido.setCellValueFactory(new PropertyValueFactory<Usuario, String>("apellidoUsuario"));
        clmEmail.setCellValueFactory(new PropertyValueFactory<Usuario, String>("emailUsuario"));
        clmfecha.setCellValueFactory(new PropertyValueFactory<Usuario, Date>("fechaNacimiento"));
        clmBalance.setCellValueFactory(new PropertyValueFactory<Usuario, Double>("balance"));
        clmIdRoll.setCellValueFactory(new PropertyValueFactory<Usuario, String>("roleDesc"));
        gestionarEventos();
        conexion.cerrarConexion();
    }

    @FXML
    public void gestionarEventos(){
        tablaUsuario.getSelectionModel().selectedItemProperty().addListener(new ChangeListener<Usuario>() {

            @Override
            public void changed(ObservableValue<? extends Usuario> arg0, Usuario valorAnterior, Usuario valorSeleccionado) {
                String strId = Integer.toString(valorSeleccionado.getIdUsuario());
                String strMony = Double.toString(valorSeleccionado.getBalance());
                tId.setText(strId);
                tNombre.setText(valorSeleccionado.getNombreUsuario());
                tApellido.setText(valorSeleccionado.getApellidoUsuario());
                tEmail.setText(valorSeleccionado.getEmailUsuario());
                tablaName.setPromptText(valorSeleccionado.getRoleDesc());
                tEdad.setValue(valorSeleccionado.getFechaNacimiento());
                tablaName.setPromptText(String.valueOf(valorSeleccionado.getRoleDesc()));
                tMony.setText(strMony);


            }
            
        });
    }
     @FXML
     public void actualizarRegistro(){
       
        Usuario u = new Usuario(Integer.valueOf(tId.getText()), tNombre.getText(), tApellido.getText(), tEmail.getText(), Date.valueOf(tEdad.getValue()).toLocalDate(), tablaName.getSelectionModel().getSelectedItem().getIdRol(), Double.valueOf(tMony.getText()));    
        conexion.establecerConexion();
        int resultado = u.actualizarRegistro(conexion.getConnection());
        conexion.cerrarConexion();
        if (resultado == 1){

/*             listaUs.set(tablaUsuario.getSelectionModel().getSelectedIndex(),u); */   //para hacer que la lista se actualice automaticamente, funciona mal
            Alert mensaje = new Alert(AlertType.INFORMATION);
            mensaje.setTitle("updated user");
            mensaje.setContentText("The user has been updated successfully");
            mensaje.setHeaderText("Result:");
            mensaje.show();
            
        }

    }  

    @FXML
    public void eliminarRegistro(){
        Usuario u = new Usuario(Integer.valueOf(tId.getText()));    
        conexion.establecerConexion();
        int resultado = u.eliminarRegistro(conexion.getConnection());
        conexion.cerrarConexion();
        if (resultado == 1){

            /* listaUs.set((tablaUsuario.getSelectionModel().getSelectedIndex()),u); */   //para hacer que la lista se actualice automaticamente, funciona mal
            Alert mensaje = new Alert(AlertType.INFORMATION);
            mensaje.setTitle("eliminated user");
            mensaje.setContentText("The user has been eliminated successfully");
            mensaje.setHeaderText("Result:");
            mensaje.show();
            
        }
    }
    
    @FXML
    private void pasoPag() throws IOException {
        App.setRoot("Menu");
    }

    

}
