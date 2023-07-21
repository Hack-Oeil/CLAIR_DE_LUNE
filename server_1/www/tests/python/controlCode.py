import random

currentResponse = False

def luhnValidation(code):
    numbers = list(map(int, str(code)))[::-1]
    total = 0
    for key, number in enumerate(numbers):
        if key % 2 != 0:
            number *= 2
        total += number if number <= 9 else number - 9
    return total % 10 == 0

def stdin():
    global currentResponse
    code = ''.join(str(random.randint(1, 9)) for _ in range(15))
    currentResponse = luhnValidation(code)
    return code

def hoTryCode():
    global currentResponse
    if 'main' in globals() and callable(main):
        try:
            returnBoolean = main()
            if returnBoolean == currentResponse:
                print(True)
            else:
                print("Votre code ne correspond pas à l'algorithme attendu.")
        except Exception as error:
            print("Il y a une erreur dans votre code : " + str(error))
    else:
        print('Erreur : fonction main introuvable.')