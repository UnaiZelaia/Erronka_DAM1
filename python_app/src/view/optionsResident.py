from src.model import Resident


def printResidentMain():
    while True:
        run = range(1, 5)
        print("============================================================")
        print("Select on of the options.")
        print("\t1- Show residents.")
        print("\t2- Create new resident.")
        print("\t3- Delete a resident.")
        print("\t4- Exit.")
        print("============================================================")
        opt = int(input("Select an option: "))
        if opt in run:

            match opt:
                case 1:
                    Resident.Resident.printResidents()
                case 2:
                    id_user = int(input("Enter the id of the resident: "))
                    user_name = input("Enter the name of the resident: ")
                    user_surname = input("Enter the surname of the resident: ")
                    user_email = input("Enter the email of the resident: ")
                    resident_allergy = input("Enter the allergy of the resident: ")
                    resident = Resident.Resident(id_user, user_name, user_surname, user_email,
                                                 resident_allergy)
                    resident.newResident()
                case 3:
                    id_user = int(input("Enter the id of the resident: "))
                    user_name = input("Enter the name of the resident: ")
                    user_surname = input("Enter the surname of the resident: ")
                    user_email = input("Enter the email of the resident: ")
                    resident_allergy = input("Enter the allergy of the resident: ")
                    resident = Resident.Resident(id_user, user_name, user_surname, user_email,
                                                 resident_allergy)
                    resident.deleteResident()
                case 4:
                    break
        else:
            printResidentMain()
