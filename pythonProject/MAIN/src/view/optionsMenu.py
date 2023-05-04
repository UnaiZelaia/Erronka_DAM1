import datetime

from MAIN.src.model import Menu, User, Reserve
from MAIN.src.controller import ReserveFunctions


def printMainMenu():
    c = 1
    while c == 1:
        print("============================================================")
        print("Select on of the options:")
        print("\t1- Manage reservations.")
        print("\t2- Create new user.")
        print("\t3- Create new menu")
        print("\t4- Print users")
        print("\t5- Print menus")
        print("\t6- Print reserves")
        print("\t7- Exit application")
        print("============================================================")
        opt = int(input("Select an option: "))

        match opt:
            case 1:
                printReserveSubmenu()
            case 2:
                user = ReserveFunctions.createNewUserObject()
                ReserveFunctions.writeUserToFile(user)
                print("User successfully saved.")
            case 3:
                menu = ReserveFunctions.createMenuObject()
                ReserveFunctions.writeMenuToFile(menu)
            case 4:
                ReserveFunctions.readUsers()
            case 5:
                ReserveFunctions.readMenus()
            case 6:
                ReserveFunctions.readReserves()
            case 7:
                c = 2


def printReserveSubmenu():
    print("============================================================")
    print("Managing reservations: Choose an option.")
    print("\t1- Show reservations.")
    print("\t2- Create a new reservation.")
    print("\t3- Delete a reservation.")
    print("\t4- Update a reservation.")
    print("\t5- Go back.")
    print("============================================================")
    opt = int(input("Select an option: "))

    match opt:
        case 1:
            ReserveFunctions.readReserves()
            printReserveSubmenu()
        case 2:
            reserve = ReserveFunctions.createReserveObject()
            ReserveFunctions.writeReserveToFile(reserve)
            printReserveSubmenu()
        case 3:
            ReserveFunctions.deleteReserve()
            printReserveSubmenu()
        case 4:
            ReserveFunctions.updateReserve()
            printReserveSubmenu()
        case 5:
            printMainMenu()
        case default:
            print("Select a valid option.")
            printReserveSubmenu()
