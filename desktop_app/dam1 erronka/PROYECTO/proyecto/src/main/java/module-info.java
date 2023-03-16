module dambat {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.sql;

    opens sample to javafx.fxml;
    opens sample.model to javafx.fxml;

    opens dambat to javafx.fxml;
    exports dambat;

    exports sample;
    exports sample.model;
}
