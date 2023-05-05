import pickle, os


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
        dir_path = os.path.dirname(os.path.realpath(__file__))
        file_path = os.path.join(dir_path, "..", "..", "files", "Residents.pkl")
        with open(file_path, 'ab') as f:
            pickle.dump({"Id": self.id_user, "Name": self.name, "Surname": self.surname, "Email": self.email,
                         "Role": self.role, "Allergy": self.allergy}, f)

    @staticmethod
    def printResidents():
        dir_path = os.path.dirname(os.path.realpath(__file__))
        file_path = os.path.join(dir_path, "..", "..", "files", "Residents.pkl")
        with open(file_path, 'rb') as f:
            try:
                while True:
                    print(pickle.load(f))
            except EOFError:
                pass

    def deleteResident(self):
        dir_path = os.path.dirname(os.path.realpath(__file__))
        file_path = os.path.join(dir_path, "..", "..", "files", "Residents.pkl")
        with open(file_path, 'rb') as f:
            residents = []
            try:
                while True:
                    resident = pickle.load(f)
                    if resident['Id'] != self.id_user:
                        residents.append(resident)
            except EOFError:
                pass

        with open(file_path, 'wb') as f:
            for resident in residents:
                pickle.dump(resident, f)

    @staticmethod
    def changeResident(id_user, new_allergy):
        resident_exists = False
        dir_path = os.path.dirname(os.path.realpath(__file__))
        file_path = os.path.join(dir_path, "..", "..", "files", "Residents.pkl")
        with open(file_path, 'rb') as f:
            residents = []
            try:
                while True:
                    resident = pickle.load(f)
                    if resident['Id'] == id_user:
                        resident_exists = True
                        resident['Allergy'] = new_allergy
                    residents.append(resident)
            except EOFError:
                pass

        if not resident_exists:
            print(f'Resident with id {id_user} not found.')

        with open(file_path, 'wb') as f:
            for resident in residents:
                pickle.dump(resident, f)
