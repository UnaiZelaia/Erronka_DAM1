import pickle


class Resident:
    role = "Resident"

    def __init__(self, id_user, name, surname, email, allergy):
        self.id_user = id_user
        self.name = name
        self.surname = surname
        self.email = email
        self.allergy = allergy

    def print(self):
        if __name__ == "Resident":
            print(self.id_user, self.name, self.surname, self.email, self.role, self.allergy)

    def newResident(self):
        with open("files/Residents.pickle", "ab") as f:
            pickle.dump({"id": self.id_user, "name": self.name, "surname": self.surname, "email": self.email,
                         "role": self.role, "allergy": self.allergy}, f)

    @staticmethod
    def printResidents():
        with open("files/Residents.pickle", "rb") as f:
            try:
                while True:
                    print(pickle.load(f))
            except EOFError:
                pass

    def deleteResident(self):
        with open("files/Residents.pickle", "rb") as f:
            residents = []
            try:
                while True:
                    resident = pickle.load(f)
                    if resident["id"] != self.id_user and resident["name"] != self.name:
                        residents.append(resident)
            except EOFError:
                pass

        with open("files/Residents.pickle", "wb") as f:
            for resident in residents:
                pickle.dump(resident, f)
