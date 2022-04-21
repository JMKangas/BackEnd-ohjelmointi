let bruttoPalkka, nettoPalkka, veroProsentti;

function kysyPalkka() {

    bruttoPalkka = prompt("Paljo tienaat?")
    veroProsentti = prompt("Mikä on veroprosenttisi?")


    console.log(laskeNetto(bruttoPalkka, veroProsentti));
    nettoPalkka = laskeNetto(bruttoPalkka, veroProsentti);
    alert("Tienaat " + nettoPalkka);
}
