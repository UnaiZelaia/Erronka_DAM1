import csv


class Reserve():

    def __init__(self, id_user, id_menu, date):
        self.id_user = id_user
        self.id_menu = id_menu
        self.date = date


    def print(self):
        print(self.id_user, self.id_menu, self.date)


    def printReserves(self):
        f = open("files/Reserves.csv", "r+")

        with f:
            reader = csv.DictReader(f)
            values = reader.reader

            for row in values:
                print(row)
            f.close

    def newReserve(self, user, menu, date):
        f = open("files/Reserves.csv", "a+")

        with f:
            sniffer = csv.Sniffer()
            hasHeader = sniffer.has_header(f.read(1024))
            if hasHeader != True:
                fnames = ["id_user", "id_menu", "date"]
                writer = csv.DictWriter(f, fieldnames=fnames)
                writer.writeheader()
            else:
                writer = csv.DictWriter(f)
                writer.writerow({"id_user": user.id_user, "id_menu": menu.id, "date": date})

    def deleteReserve(self, user, menu, date):
        f = open("files/Reserves.csv", "r+")



