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
