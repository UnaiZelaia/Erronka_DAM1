from MAIN.src.model.Employees import Employee
from MAIN.src.controller import Employeesfunctions


def employeesubmenu():
    repeat = True
    while repeat:
        print("\n============================================================")
        print("             Employees menu")
        print("1-Add ")
        print("2-Read ")
        print("3-Edit")
        print("4-Delete")
        print("============================================================ \n")
        a = int(input("Select the option that you want:  "))
        if a == 1:
            e1 = Employee()
            Employeesfunctions.add(e1, '../../files/employee.pkl')
        elif a == 2:
            print("These are the employees:  \n ")
            Employeesfunctions.read("../../files/employee.pkl")
        elif a == 3:
            Employeesfunctions.read("../../files/employee.pkl")
            Employeesfunctions.edit("../../files/employee.pkl")
        elif a == 4:
            Employeesfunctions.read("../../files/employee.pkl")
            Employeesfunctions.delete("../../files/employee.pkl")
        else:
            print("Invalid option")

        repeat_input = input("Do you want to perform another operation? (y/n): ")
        if repeat_input.lower() == 'n':
            repeat = False

    employeesubmenu()
