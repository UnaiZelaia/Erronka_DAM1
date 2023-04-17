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
        f = open("files/Menus.csv", "a+")

        with f:
            fnames = ["id", "name", "items"]

            writer = csv.DictWriter(f, fieldnames=fnames)
            writer.writeheader()
            writer.writerow({"id": self.id, "name": self.name, "items": self.items})
            f.close

    def printMenus(self):
        f = open("files/Menus.csv", "r+")

        with f:
            reader = csv.DictReader(f)
            values = reader.reader

            for row in values:
                print(row)
            f.close()
