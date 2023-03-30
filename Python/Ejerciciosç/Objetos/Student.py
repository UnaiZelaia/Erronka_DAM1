from Persona import Persona
class Student(Persona):
     def __init__(self, i,n, s,M,e,p,d,r,b,a):
         super().__init__(i,n,s,M,e,p,d,r,b)
         self.alergia = a
    
     def setAlergias(self):
         alergia = input("enter the allergies: ")
         
     def printS(self):
         super().print()
         print(self.alergia)
         

