from person import Person
from employees import Employee
import functions

def employeesubmenu():
    repeat = True
    while repeat:
        print("Employees menu")
        print("1-Add ")
        print("2-Read ")
        print("3-Edit")
        print("4-Delete")
        a = int(input("Select the option that you want:  "))
        if a == 1:
            E1 = Employee()
            functions.add(E1, 'employee.pkl')
        elif a == 2:
            print("These are the employees:  \n ")
            functions.read("employee.pkl")        
        elif a == 3:
            functions.read("employee.pkl")   
            functions.edit("employee.pkl")
        elif a == 4:
            functions.read("employee.pkl")   
            functions.delete("employee.pkl")
        else:
            print("Invalid option")
            
        repeat_input = input("Do you want to perform another operation? (y/n): ")
        if repeat_input.lower() == 'n':
            repeat = False

employeesubmenu()
