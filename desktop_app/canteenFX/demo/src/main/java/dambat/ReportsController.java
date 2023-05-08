package dambat;

import java.io.IOException;
import java.net.URL;
import java.sql.Date;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import model.Conexion;
import model.Transactions;

public class ReportsController implements Initializable{
    //columnas
    @FXML private TableColumn<Transactions, Number> clmId;
    @FXML private TableColumn<Transactions, String> clmNombre;
    @FXML private TableColumn<Transactions, Date> clmDate;
    @FXML private TableColumn<Transactions, Double> clmBalance; 
    //componentes interfaz grafica

    @FXML private TableView<Transactions> tablaTransaction;
    //listas
    @FXML private ObservableList<Transactions> listaTr;
    private Conexion conexion;
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        conexion = new Conexion();
        conexion.establecerConexion();
        //iniciar listas
        listaTr = FXCollections.observableArrayList();
        //llenar listas
        Transactions.llenarTablaRegistro(conexion.getConnection(), listaTr);
        //enlazar listas y Tableview
        tablaTransaction.setItems(listaTr);

        //enlazar columnas con atributos
        clmId.setCellValueFactory(new PropertyValueFactory<Transactions, Number>("idTransaction"));
        clmNombre.setCellValueFactory(new PropertyValueFactory<Transactions, String>("nameU"));
        clmDate.setCellValueFactory(new PropertyValueFactory<Transactions, Date>("tDate"));
        clmBalance.setCellValueFactory(new PropertyValueFactory<Transactions, Double>("quantity"));
        conexion.cerrarConexion();
    }



    @FXML
    private void pasoPag() throws IOException {
        App.setRoot("Menu");
    }

}