package dambat;

import java.io.IOException;
import java.net.URL;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.ResourceBundle;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.RadioButton;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.cell.PropertyValueFactory;
import model.Conexion;
import model.Transactions;
import model.Usuario;

public class CTransaction implements Initializable{
    //columnas
    @FXML private TableColumn<Usuario, Number> clmId;
    @FXML private TableColumn<Usuario, String> clmNombre;
    @FXML private TableColumn<Usuario, String> clmApellido;
    @FXML private TableColumn<Usuario, Double> clmBalance; 
    //componentes interfaz grafica
        //Text
    @FXML private TextField tId;
    @FXML private TextField tNombre;
    @FXML private TextField tApellido;
    @FXML private TextField tMony;
    @FXML private RadioButton rbtCash;
    @FXML private RadioButton rbtCard;

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
        clmId.setCellValueFactory(new PropertyValueFactory<Usuario, Number>("idUsuario"));
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
                String strId = Integer.toString(valorSeleccionado.getIdUsuario());
                tId.setText(strId);
                tNombre.setText(valorSeleccionado.getNombreUsuario());
                tApellido.setText(valorSeleccionado.getApellidoUsuario());
            }
            
        });
    }

    public void nuevoRegistro2(){
        String payment = "";
        if(rbtCard.isSelected()){
            payment = "Card";
        }else if(rbtCash.isSelected()){
            payment = "Cash";
        }
        LocalDate date = LocalDateTime.now().toLocalDate();

        conexion = new Conexion();
        conexion.establecerConexion();
        //crear nuevo usuario llama al metodo nuevoRe0gistro
        Transactions u = new Transactions(0, Integer.valueOf(tId.getText()),Double.valueOf(tMony.getText()), date, payment /*, ((Transactions) tPago.getSelectionModel().getSelectedItem()).getMethod() */);

        //llama al metodo nuevoRe0gistro
        int resultado = u.nuevoRegistro2(conexion.getConnection());
        conexion.cerrarConexion();
        if (resultado == 1){
            Alert mensaje = new Alert(AlertType.INFORMATION);
            mensaje.setTitle("added transaction");
            mensaje.setContentText("The transaction has been added successfully");
            mensaje.setHeaderText("Result:");
            mensaje.show();
            
        }

    }

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

    @FXML
    private void goReports() throws IOException {
            App.setRoot("Reports");  
    }
}