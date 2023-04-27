import csv


class Menu():

    def __init__(self, id, name, items):
        self.id = id
        self.name = name
        self.items = items


    def print(self):
        print(self.id, self.name, self.items, end = "\n")

        for item in self.items:
            print("\n\t" + item, end = "")

        print("\n")

    def newMenu(self):
        f = open("../files/Menus.csv", "r+")
        with f:
            reader = csv.reader(f)
            try:
                first_row = next(reader)
            except StopIteration:
                first_row = []


            if first_row and isinstance(first_row[0], str):
                writer = csv.DictWriter(f, fieldnames=first_row)
                writer.writerow({"id": self.id, "name": self.name, "items": self.items})
            else:
                fnames = ["id", "name", "items"]
                writer = csv.DictWriter(f, fieldnames=fnames)
                if not first_row:
                    writer.writeheader()
                writer.writerow({"id": self.id, "name": self.name, "items": self.items})

    def printMenus(self):
        f = open("../files/Menus.csv", "r+")

        with f:
            reader = csv.DictReader(f)
            values = reader.reader

            for row in values:
                print(row)
            f.close()
    def deleteMenu(self):
        f = open("../files/Menus.csv", "r+")

        with f:
            reader = csv.DictReader(f)
            values = reader.reader