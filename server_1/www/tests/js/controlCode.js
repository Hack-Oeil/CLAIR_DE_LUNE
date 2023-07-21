let currentResponse = false;

function luhnValidation(code) {
  const numbers = Array.from(String(code), Number).reverse();
  let total = 0;
  for (let key = 0; key < numbers.length; key++) {
    let number = numbers[key];
    if (key % 2 !== 0) number *= 2;
    total += number > 9 ? number - 9 : number;
  }
  return total % 10 === 0 ? true : false;
}

// Fonction obligatoire
function stdin() {
    const code = Array.from({ length: 15 }, () => Math.floor(Math.random() * 9) + 1).join('');
    currentResponse = luhnValidation(code);
    return code;
}

// Fonction obligatoire
function hoTryCode() {
  if (typeof main === 'function') {
    try {
      const returnBoolean = main();
      if (returnBoolean === currentResponse) {
        return true;
      } else {
        return "Votre code ne correspond pas à l'algorithme attendu.";
      }
    } catch (error) {
      return "Il y a une erreur dans votre code : " + error.message;
    }
  } else {
    return 'Erreur : fonction main introuvable.';
  }
}