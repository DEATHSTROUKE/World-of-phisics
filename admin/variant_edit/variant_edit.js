function send() {
    var num = document.querySelectorAll('input[name=number]');
    var orig_num = document.querySelectorAll('input[name=orig_num]');
    var text = document.querySelectorAll('textarea[name=text]');
    var ans = document.querySelectorAll('input[name=answer]');
    var params = {
        'exam': document.querySelector('input[name=exam]').value,
        'variant': document.querySelector('input[name=variant]').value,
        'task': []
    };
    var fl = true;
    for (let i = 0; i < num.length; i++) {
        for (let j = i + 1; j < num.length; j++) {
            if (num[i].value == num[j].value) {
                fl = false;
                break;
            }
        }
        if (!fl) {
            break;
        }
    }
    if (!fl) {
        alert('Номера заданий должны быть уникальными');
    } else {
        for (let i = 0; i < num.length; i++) {
            if (num[i].value.trim() != '' && text[i].value.trim() != '' &&
                ans[i].value.trim() != '') {
                let a = {
                    'num': num[i].value,
                    'orig_num': orig_num[i].value,
                    'text': text[i].value,
                    'ans': ans[i].value
                };
                params['task'].push(a);
            } else {
                alert('Не должно быть пустых полей');
                fl = false;
                break;
            }
        }
        if (fl) {
            ajaxGet('/admin/variant_proc.php', 'post',
                'params=' + JSON.stringify(params), verdict);
        }
    }
}

function ajaxGet(url, method, params, callback) {
    let xhr = new XMLHttpRequest();
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

function verdict(text) {
    console.log(text);
    if (text == 'OK') {
        var num = document.querySelectorAll('input[name=number]');
        var orig_num = document.querySelectorAll('input[name=orig_num]');
        for (let i = 0; i < num.length; i++) {
            if (orig_num[i].value != num[i].value) {
                orig_num[i].value = num[i].value;
            }
        }
        alert('Вариант успешно сохранен');
    } else {
        alert('Допущена ошибка при заполнении полей');
    }
}

