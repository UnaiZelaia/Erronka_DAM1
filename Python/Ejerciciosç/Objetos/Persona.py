from BasicMethods import BasicMethods
class Persona:
    def __init__(self, i,n, s,M,e,p,d,r,b):
       self.id= i
       self.name = n
       self.surname = s
       self.movile = M
       self.email = e
       self.password = p
       self.date = d
       self.rol = r
       self.balance = b
       
    def setid(self):
        id=BasicMethods.askInteger(id)
        input("Enter the value of the id")

    def setname(self ):
        self.name=input("Enter the value of the name")

    def setsurname(self ):
        self.surname=input("Enter the value of the surname")

    def setmovil(self ):
        self.movile=input("Enter the value of the movile number")
        
    def setmovil(self ):
        self.email=input("Enter the value of the email")
        
    def setmovil(self ):
        self.password=input("Enter the value of the password")
        
    def setmovil(self ):
        self.date=input("Enter the value of the date")
        
    def setmovil(self ):
        self.rol=input("Enter the value of the rol")
        
    def setmovil(self ):
        self.balance=input("Enter the value of the balance")

    def print(self):
        print(self.Id, self.name,self.surname,self.movile,self.email,self.password,self.date,self.rol,self.balance)






