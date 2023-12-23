const filter = document.getElementById('myFilter');
const inputFilter = document.getElementById('search-input');
const forName = document.getElementById('forName');
const forBDate = document.getElementById('forBDate');
const forEDate = document.getElementById('forEDate');



const filterChange = () => {
    var val = filter.value;

    if (val == 'name') {
        forName.style.display = 'flex';
        forBDate.style.display = 'none';
        forEDate.style.display = 'none';
    } else if (val == 'bday') {
        forBDate.style.display = 'flex';
        forEDate.style.display = 'nonw';
        forName.style.display = 'none';
    } else if (val == 'eday') {
        forEDate.style.display = 'flex';
        forBDate.style.display = 'none';
        forName.style.display = 'none';
    }
}