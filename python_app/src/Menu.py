class Menu():

    def __init__(self, id, name, items):
        self.id = id
        self.name = name
        self.items = items


    def print(self):
        print(self.id, self,name, self.items, end = "\n")

        for item in items:
            print("\n\t" + item, end = "")

        print("\n")
