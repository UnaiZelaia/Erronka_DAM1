import csv


class Reserve():

    def __init__(self, id_user, id_menu, date):
        self.id_user = id_user
        self.id_menu = id_menu
        self.date = date

    def print(self):
        print(self.id_user, self.id_menu, self.date)

    def printReserves(self):
        f = open("../files/Reserves.csv", "r")
        with f:
            reader = csv.DictReader(f)

            for row in reader:
                print(row)
            f.close()

    def newReserve(self, user, menu, date):
        f = open("../files/Reserves.csv", "r+")

        with f:
            header = csv.reader(f)
            try:
                first_row = next(header)
            except StopIteration:
                first_row = []
            if first_row and isinstance(first_row[0], str):
                writer = csv.DictWriter(f, fieldnames=first_row)
                writer.writerow({"id_user": self.id_user, "id_menu": self.id_menu, "date": self.date})
            else:
                fnames = ["id_user", "id_menu", "date"]
                writer = csv.DictWriter(f, fieldnames=fnames)
                if not first_row:
                    writer.writeheader()
                writer.writerow({"id_user": self.id_user, "id_menu": self.id_menu, "date": self.date})

    def deleteReserve(self, user, menu, date):
        f = open("../files/Reserves.csv", "r+")
        reader = csv.reader(f)
        rows = list(reader)

        with open("../files/Reserves.csv", "w", newline='') as f:
            writer = csv.writer(f)
            writer.writerow(["id_user", "id_menu", "date"])

            for row in rows:
                if len(row) < 3:
                    continue

                if row[0] == user and row[1] == menu and row[2] == date:
                    continue
                writer.writerow(row)
