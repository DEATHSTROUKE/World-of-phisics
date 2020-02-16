function change_txt(n) {
    inp = document.getElementById('fio');
    if (n == 0) {
        inp.placeholder = 'Фамилия Имя'
    } else if (n == 1) {
        inp.placeholder = 'Фамилия Имя Отчество'
    }
}