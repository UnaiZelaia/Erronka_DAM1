<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 52dde8da9920bc5f1c4f1a591bda09dd3eb352f0
import pickle


class Resident:
    role = "Resident"

    def __init__(self, id_user, name, surname, email, role, allergy):
        self.id_user = id_user
        self.name = name
        self.surname = surname
        self.email = email
        self.role = role
        self.allergy = allergy

    def print(self):
        if __name__ == "resident":
            print(self.id_user, self.name, self.surname, self.email, self.role, self.allergy)

    def newResident(self):
        with open("../files/Residents.pickle", "ab") as f:
            pickle.dump({"Id": self.id_user, "Name": self.name, "Surname": self.surname, "Email": self.email,
                         "Role": self.role, "Allergy": self.allergy}, f)

    @staticmethod
    def printResidents():
        with open("../files/Residents.pickle", "rb") as f:
            try:
                while True:
                    print(pickle.load(f))
            except EOFError:
                pass

    def deleteResident(self):
        with open("../files/Residents.pickle", "rb") as f:
            residents = []
            try:
                while True:
                    resident = pickle.load(f)
                    if resident["Id"] != self.id_user:
                        residents.append(resident)
            except EOFError:
                pass

        with open("../files/Residents.pickle", "wb") as f:
            for resident in residents:
                pickle.dump(resident, f)
<<<<<<< HEAD

    def changeResident(self, id_user, new_allergy):
        resident_exists = False
        with open("../files/Residents.pickle", "rb") as f:
=======
=======
import pickle


class Resident:
    role = "Resident"

    def __init__(self, id_user, name, surname, email, role, allergy):
        self.id_user = id_user
        self.name = name
        self.surname = surname
        self.email = email
        self.role = role
        self.allergy = allergy

    def print(self):
        if __name__ == "resident":
            print(self.id_user, self.name, self.surname, self.email, self.role, self.allergy)

    def newResident(self):
        with open("files/Residents.pickle", "ab") as f:
            pickle.dump({"Id": self.id_user, "Name": self.name, "Surname": self.surname, "Email": self.email,
                         "Role": self.role, "Allergy": self.allergy}, f)

    @staticmethod
    def printResidents():
        with open("files/Residents.pkl", "rb") as f:
            try:
                while True:
                    print(pickle.load(f))
            except EOFError:
                pass

    def deleteResident(self):
        with open("files/Residents.pkl", "rb") as f:
>>>>>>> 52dde8da9920bc5f1c4f1a591bda09dd3eb352f0
            residents = []
            try:
                while True:
                    resident = pickle.load(f)
<<<<<<< HEAD
                    if resident["Id"] == id_user:
                        resident_exists = True
                        resident["Allergy"] = new_allergy
                    residents.append(resident)
            except EOFError:
                pass

        if not resident_exists:
            print(f"Resident with id {id_user} not found.")

        with open("../files/Residents.pickle", "wb") as f:
            for resident in residents:
                pickle.dump(resident, f)


=======
                    if resident["Id"] != self.id_user:
                        residents.append(resident)
            except EOFError:
                pass

        with open("files/Residents.pkl", "wb") as f:
            for resident in residents:
                pickle.dump(resident, f)
>>>>>>> 2865dd8b228d33e48cea2eaf03eb926bc828c3ae
>>>>>>> 52dde8da9920bc5f1c4f1a591bda09dd3eb352f0
