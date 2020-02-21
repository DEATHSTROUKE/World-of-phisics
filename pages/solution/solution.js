function finish() {
    var ans = document.querySelectorAll('input[name=ans]');
    var num = document.querySelectorAll('input[name=num]');
    var params = {
        'exam': document.querySelector('input[name=exam]').value,
        'var': document.querySelector('input[name=variant]').value,
        'answers': {}
    };
    var is_empty = false;
    for (let i = 0; i < num.length; i++) {
        params['answers'][num[i].value.trim()] = ans[i].value.trim();
        if (ans[i].value.trim() == '') {
            is_empty = true;
        }
    }
    if (is_empty) {
        if (!confirm('У вас есть незаполненные поля. Вы действительно хотите завершить тест?')) {
            return;
        }
    } else {
        if (!confirm('Вы действительно хотите завершить тест?')) {
            return;
        }
    }
    ajaxGet('post', '/pages/results.php',
        'params=' + JSON.stringify(params), procecor)
}

function ajaxGet(method, url, params, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            callback(xhr.responseText);
        }
    };
    xhr.open(method, url, true);
    if (method == 'post') {
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    }
    xhr.send(params);
}

function procecor(text) {
    document.getElementById('content').innerHTML = text
}

