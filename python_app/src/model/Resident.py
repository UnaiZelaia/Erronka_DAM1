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
    def changeResident(self, id_user, new_allergy):
        resident_exists = False
        with open("../files/Residents.pickle", "rb") as f:
            

