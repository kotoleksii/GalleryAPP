function MessageBox(text, type) {
    let div = document.createElement('div');
    div.innerHTML = text;

    let base = 'width: -moz-fit-content; width: fit-content;' +
     'padding: 12px 16px; border-radius: 4px; border-style: solid; border-width: 1px;' + 
     'margin-bottom: 12px; margin-top: 100px; margin-left: auto; margin-right: auto; font-size: 16px;';

     if (type == 'success')
        div.setAttribute('style', base + 'background-color: rgba(204, 243, 222, 1);' + 
        'border-color: rgba(104, 220, 159, 1); color: rgba(5, 197, 94, 1);');

    if (type == 'info')
        div.setAttribute('style', base + 'background-color: rgba(204, 243, 222, 1);' + 
        'border-color: rgba(126, 182, 193, 1); color: rgba(49, 112, 143, 1);');

    if (type == 'warning')
        div.setAttribute('style', base + 'background-color: rgba(255, 248, 219, 1);' + 
            'border-color: rgba(255, 235, 149, 1); color: rgba(255, 132, 26, 1);');

    if (type == 'danger')
    div.setAttribute('style', base + 'background-color: rgba(244, 213, 219, 1);' + 
        'border-color: rgba(225, 130, 150, 1); color: rgba(255, 56, 1, 1);');

    document.body.append(div);
}