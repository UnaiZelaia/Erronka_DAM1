import csv


class User:

    role = "none"

    def __init__(self, id_user, name, surname, email):
        self.id_user = id_user
        self.name = name
        self.surname = surname
        self.email = email

    def print(self):
        if __name__ == "User":
            print(self.id_user, self.name, self.surname, self.email, self.role)

    def newUser(self):
        f = open("../files/Users.csv", "r+")
        with f:
            reader = csv.reader(f)
            try:
                first_row = next(reader)
            except StopIteration:
                first_row = []
            if first_row and isinstance(first_row[0], str):
                writer = csv.DictWriter(f, fieldnames=first_row)
                writer.writerow({"id": self.id_user, "name": self.name, "surname": self.surname, "email": self.email, "role": self.role})
            else:
                fnames = ["id", "name", "surname", "email", "role"]
                writer = csv.DictWriter(f, fieldnames=fnames)
                if not first_row:
                    writer.writeheader()
                writer.writerow({"id": self.id_user, "name": self.name, "surname": self.surname, "email": self.email, "role": self.role})

    def printUsers(self):
        f = open("files/Users.csv", "r+")

        with f:
            reader = csv.DictReader(f)
            values = reader.reader

            for row in values:
                print(row)
            f.close














