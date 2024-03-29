package model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
    private Connection connection;
    private String url = "jdbc:mysql://192.168.122.160/canteen"; //Reemplazar por url de BBDD en producción
    private String usuario = "unai"; //Reemplazar por ususario en producción
    private String contraseña = "123"; //Reemplazar por contraseña en produccin

    public Connection getConnection() {
        return connection;
    }

    public void setConnection(Connection connection) {
        this.connection = connection;
    }

    public void establecerConexion() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection = DriverManager.getConnection(url, usuario, contraseña);
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    public void cerrarConexion(){
        try {
            connection.close();
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }
}

// si la base de datos esta ubicada en dominio
// https://youtu.be/1g29Je_g7dI?t=548