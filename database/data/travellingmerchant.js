//https://runescape.wiki/w/Travelling_Merchant%27s_Shop/Future
let table = document.querySelector('.wikitable.sticky-header');
let data = []
for (let i = 1; i < table.rows.length; i++) {
    data.push({
        name: table.rows[i].cells[0].textContent,
        slotA: table.rows[i].cells[2].textContent,
        slotB: table.rows[i].cells[3].textContent,
        slotC: table.rows[i].cells[4].textContent
    })
}
