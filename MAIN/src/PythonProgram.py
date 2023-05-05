from MAIN.src.view import optionsEmployees, optionsMenu, optionsResident


def printMainProgram():
    while True:
        run = range(1, 5)
        print("\n============================================================")
        print("             Manage of the Canteen")
        print("\t1- Employees options.")
        print("\t2- Menu options.")
        print("\t3- Resident options.")
        print("\t4- Exit.")
        print("============================================================\n")
        opt = int(input("Select an option: "))
        if opt in run:

            match opt:
                case 1:
                    optionsEmployees.employeesubmenu()
                case 2:
                    optionsMenu.printMainMenu()
                case 3:
                    optionsResident.printResidentMain()
                case 4:
                    exit()
        else:
            printMainProgram()
