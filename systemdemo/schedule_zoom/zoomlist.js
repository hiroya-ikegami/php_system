var table = document.getElementById('zoom_table');

for(let row of table.rows){
    console.log(row);
    for(let cell of row.cells){
        cell.style.backgroundColor = "#blue";
        console.log(cell.innerText);
    }
}