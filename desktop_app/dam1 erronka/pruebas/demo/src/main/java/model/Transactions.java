package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.time.LocalDate;
import javafx.beans.property.DoubleProperty;
import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleDoubleProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;
import javafx.collections.ObservableList;


public class Transactions {
    private IntegerProperty idTransaction;
    private IntegerProperty idUser;
    private DoubleProperty quantity;
    private LocalDate tDate;
    private StringProperty method;
    private StringProperty nameU;

    
    public Transactions(int idTransaciton, String nameU, double quantity, LocalDate tDate, String method) {
        this.idTransaction = new SimpleIntegerProperty(idTransaciton);
        this.nameU = new SimpleStringProperty(nameU);
        this.quantity = new SimpleDoubleProperty(quantity);
        this.tDate = tDate;
        this.method = new SimpleStringProperty(method);
    }
    
    //prueba
    public Transactions(int idTransaciton, int idUser, double quantity, LocalDate tDate, String method) {
        this.idTransaction = new SimpleIntegerProperty(idTransaciton);
        this.idUser = new SimpleIntegerProperty(idUser);
        this.quantity = new SimpleDoubleProperty(quantity);
        this.tDate = tDate;
        this.method = new SimpleStringProperty(method);

    }

    public Transactions(int idTransaciton, int idUser, LocalDate tDate, double quantity) {
        this.idTransaction = new SimpleIntegerProperty(idTransaciton);
        this.idUser = new SimpleIntegerProperty(idUser);
        this.quantity = new SimpleDoubleProperty(quantity);
        this.tDate = tDate;

    }


    public int getIdTransaction() {
        return idTransaction.get();
    }


    public void setIdTransaciton(int idTransaciton) {
        this.idTransaction = new SimpleIntegerProperty(idTransaciton);
    }

    public IntegerProperty IdTransactionProperty() {
		return idTransaction;
	}


    public int getIdUser() {
        return idUser.get();
    }


    public void setIdUser(int idUser) {
        this.idUser = new SimpleIntegerProperty(idUser);
    }

    public IntegerProperty IdUserProperty() {
		return idUser;
	}

    public double getQuantity() {
        return quantity.get();
    }


    public void setQuantity(double quantity) {
        this.quantity = new SimpleDoubleProperty(quantity);
    }

    public DoubleProperty QuantityProperty() {
		return quantity;
	}

    public LocalDate getTDate() {
        return tDate;
    }


    public void setTDate(LocalDate tDate) {
        this.tDate = tDate;
    }


    public String getMethod() {
        return method.get();
    }


    public void setMethod(String method) {
        this.method = new SimpleStringProperty(method);
    }

    public StringProperty MethodProperty() {
		return method;
	}

    public String getNameU() {
        return nameU.get();
    }


    public void setNameU(String nameU) {
        this.nameU = new SimpleStringProperty(nameU);
    }

    public StringProperty NameUProperty() {
		return nameU;
	}

    
	public int nuevoRegistro2(Connection connection){
		try {
			PreparedStatement instruccion = connection.prepareStatement("INSERT INTO transactions (id_user, transaction_quantity, transaction_date, transaction_method) VALUES (?, ?, ?, ?)"); //evita injeccion sql al enviar datos de esta forma y no con statement
			
			instruccion.setInt(1, idUser.get());
			instruccion.setDouble(2, quantity.get());
			instruccion.setDate(3, java.sql.Date.valueOf(tDate));
			instruccion.setString(4, method.get());


			return instruccion.executeUpdate();

		} catch (SQLException e) {
			e.printStackTrace();
			return 0;
		} 
	}

    public static void llenarTablaRegistro(Connection connection, ObservableList<Transactions>tablaTransaction){
		try {
			Statement instruccion = connection.createStatement();
			ResultSet resultado = instruccion.executeQuery("SELECT id_transaction, name, transaction_quantity, transaction_date, transaction_method FROM transactions INNER JOIN user ON user.id_user = transactions.id_user");

			while(resultado.next()){
				tablaTransaction.add(new Transactions(resultado.getInt("id_transaction"), resultado.getString("name"), resultado.getDouble("transaction_quantity"), resultado.getDate("transaction_date").toLocalDate(), resultado.getString("transaction_method") ));
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}
