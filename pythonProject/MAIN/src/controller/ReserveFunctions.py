import pickle
from MAIN.src.model.User import User
from MAIN.src.model.Reserve import Reserve
from MAIN.src.model.Menu import Menu


def createNewUserObject():
    name = input("Select a name for the new user: ")
    surname = input("Select a surname for the new user: ")
    email = input("Select a new email for the new user: ")
    dni = input("Select the users id (dni): ")

    user = User(dni, name, surname, email)
    return user


def createMenuObject():
    name = input("Menu name: ")
    opt = 1
    items = list()
    while opt == 1:
        item = input("Enter a new item for the menu: ")
        items.append(item)
        opt = int(input("Do you want to add another item? 1- yes 2- no "))

    menu = Menu(name, items)
    return menu


def createReserveObject():
    global month, day
    cm = 1
    cd = 1
    year = input("Enter the year for the reservation: ")
    while cm == 1:
        month = int(input("Enter the month for the reservation: "))
        if month <= 0 or month > 12:
            print("Wrong month. Please enter a value between 1 and 12")
        else:
            cm = 2

    while cd == 1:
        day = int(input("Enter the day for the reservation: "))
        if day <= 0 or day > 32:
            print("Wrong month. Please enter a value between 1 and 12")
        else:
            cd = 2

    date = str(day) + '-' + str(month) + '-' + str(year)
    user = input("Enter the user id (dni) for the new reservation: ")
    menu = input("Enter the name of the menu for the new reservation: ")

    reservation = Reserve(user, menu, date)
    return reservation


def writeUserToFile(user):
    f = open("../files/Users.pkl", "ab")

    with f as outp:
        pickle.dump(user, outp, pickle.HIGHEST_PROTOCOL)


def writeMenuToFile(menu):
    f = open("../files/Menus.pkl", "ab")

    with f as outp:
        pickle.dump(menu, outp, pickle.HIGHEST_PROTOCOL)


def writeReserveToFile(reserve):
    f = open("../files/Reserves.pkl", "ab")

    with f as outp:
        pickle.dump(reserve, outp, pickle.HIGHEST_PROTOCOL)


def readUsers():
    f = open("../files/Users.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        print(st.id_user, " - ", st.name, " - ", st.surname, " - ", st.email, " - ", st.role)


def readMenus():
    f = open("../files/Menus.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        print(st.name, " - ", st.items)


def readReserves():
    f = open("../files/Reserves.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        st.print()


def deleteReserve():
    f = open("../files/Reserves.pkl", "rb+")

    objects = []
    cont = 1
    c = 1
    i = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0

    while c == 1:
        for obj in objects:
            print(str(i) + "- ", end="")
            Reserve.print(obj)
            i = i + 1
        i = 1

        opt = int(input("Select the index of the reserve you want to delete: "))
        objects.pop(opt - 1)
        fd = open("../files/Reserves.pkl", "wb+")
        for obj in objects:
            pickle.dump(obj, fd, pickle.HIGHEST_PROTOCOL)
        print("The reservation was deleted successfully")
        c = int(input("Press 1 to keep delete another reservation. Press any other key to stop deleting. "))
    readReserves()


def updateReserve():
    f = open("../files/Reserves.pkl", "rb+")

    objects = []
    cont = 1
    c = 1
    i = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0

    while c == 1:
        for obj in objects:
            print(str(i) + "- ", end="")
            Reserve.print(obj)
            i = i + 1
        i = 1

        opt = int(input("Select the index of the reserve you want to update: "))
        print("\t1- Update date")
        print("\t2- Update user")
        print("\t3- Update menu")
        print("\tAny key- Go back")
        opt2 = int(input("Select which field you want to update: "))
        match opt2:
            case 1:
                objects[opt - 1].setDate()
            case 2:
                objects[opt - 1].setId_user()
            case 3:
                objects[opt - 1].setId_menu()
            case default:
                readReserves()
        fw = open("../files/Reserves.pkl", "wb+")

        for obj2 in objects:
            pickle.dump(obj2, fw, pickle.HIGHEST_PROTOCOL)

        print("Objects have been updated")
        c = int(input("Press 1 to update another reservation. Press any other key to stop deleting. "))
    readReserves()
