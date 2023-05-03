DELIMITER //
CREATE TRIGGER updateBalance
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE user SET balance = balance + NEW.transaction_quantity
    WHERE id_user = NEW.id_user;
END; //



DELIMITER //
CREATE TRIGGER updateBalanceReserve
AFTER INSERT ON reserve
FOR EACH ROW
BEGIN

    INSERT INTO transactions(id_user, transaction_date, transaction_method, transaction_quantity)
    VALUES(NEW.id_user, NEW.menu_date, "Meal reservation", -5.7);

END; //
