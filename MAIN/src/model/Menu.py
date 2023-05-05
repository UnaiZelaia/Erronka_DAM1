class Menu:

    def __init__(self, name, items):
        self.name = name
        self.items = items

    def print(self):
        print(self.name, self.items, end = "\n")

        for item in self.items:
            print("\n\t" + item, end = "")

        print("\n")
