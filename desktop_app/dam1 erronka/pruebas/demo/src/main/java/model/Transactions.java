package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.time.LocalDate;

import javafx.beans.property.DoubleProperty;
import javafx.beans.property.IntegerProperty;
import javafx.beans.property.SimpleDoubleProperty;
import javafx.beans.property.SimpleIntegerProperty;
import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;


public class Transactions {
    private IntegerProperty idTransaciton;
    private IntegerProperty idUser;
    private DoubleProperty quantity;
    private LocalDate tDate;
    private StringProperty method;

    
    public Transactions(int idTransaciton, int idUser, double quantity, LocalDate tDate, String method) {
        this.idTransaciton = new SimpleIntegerProperty(idTransaciton);
        this.idUser = new SimpleIntegerProperty(idUser);
        this.quantity = new SimpleDoubleProperty(quantity);
        this.tDate = tDate;
        this.method = new SimpleStringProperty(method);
    }
    
    //prueba
    public Transactions(int idTransaciton, int idUser, double quantity, LocalDate tDate) {
        this.idTransaciton = new SimpleIntegerProperty(idTransaciton);
        this.idUser = new SimpleIntegerProperty(idUser);
        this.quantity = new SimpleDoubleProperty(quantity);
        this.tDate = tDate;
    }


    public int getIdTransaciton() {
        return idTransaciton.get();
    }


    public void setIdTransaciton(int idTransaciton) {
        this.idTransaciton = new SimpleIntegerProperty(idTransaciton);
    }

    public IntegerProperty IdTransactionProperty() {
		return idTransaciton;
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

    public LocalDate gettDate() {
        return tDate;
    }


    public void settDate(LocalDate tDate) {
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
}
