function btn_over(e) {
    let btns = document.querySelectorAll('.btn__ham__menu');
    if (e == 1) {
        document.querySelector('.back__ham').style.display = 'flex';
        for (let i = 0; i < btns.length; i++) {
            btns[i].style.display = 'inline';
        }
    } else if (e == 0) {
        document.querySelector('.back__ham').style.display = 'none';
        for (let i = 0; i < btns.length; i++) {
            btns[i].style.display = 'none';
        }
    }
}