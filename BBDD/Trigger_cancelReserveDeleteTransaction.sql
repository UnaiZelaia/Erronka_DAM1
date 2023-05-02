CREATE TRIGGER cancelReserveDeleteTransaction
AFTER DELETE ON reserve
FOR EACH ROW
BEGIN

    DELETE FROM transactions WHERE id_user = OLD.id_user AND transaction_date = OLD.menu_date;