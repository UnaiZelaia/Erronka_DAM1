module dambat {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.sql;

    opens model to javafx.fxml;
    opens dambat to javafx.fxml;
    exports model;
    exports dambat;

}
