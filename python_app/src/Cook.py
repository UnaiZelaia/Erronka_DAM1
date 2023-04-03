from User import User

class Cook(User):

    role = "cook"
    
    def __init__(self, id_user, name, surname, email):
        super().__init__(id_user, name, surname, email)

    def print(self):
        print(self.id_user, self.name, self.surname, self.email, self.role)



