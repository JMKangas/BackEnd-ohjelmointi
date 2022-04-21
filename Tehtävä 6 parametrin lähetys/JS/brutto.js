
let palkka, veroP;

function laskeNetto(parametriPalkka, parametriVero) {

    veroP = parametriVero / 100;

    let veromaara = parametriPalkka * veroP;

    palkka = parametriPalkka - veromaara;

    return palkka;
}