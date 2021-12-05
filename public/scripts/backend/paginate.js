//public/scripts/admin/paginate.js
var page = 0

function paginate(route, base){
    $('.pagination img').attr('src', `${base}/public/images/loading.gif`)
    page += 1

    $.post(`${base}/admin/${route}/paginate`, {page: page}, function(data, status){
        appendItem(JSON.parse(data), route, base)
    })
}

function appendItem(items, route, base){
    var html = ''

    for(let v in items){
        html += `<div class='item'>`
        html += `<div class="thumb-wrapper">`
        html += `<a href="${base}/${route}/${items[v].id}">`
        html += `<img class="thumb" src="${items[v].thumb}" />`
        if(items[v].video){
            html += `<img class='play-icon' src="${base}/public/images/play.png" />`
        }
        html += `</a>`
        html += `</div>`
        html += `<div class='title-wrapper'>`
        html += `<div class='title'>`
        html += `<a href="${base}/${route}/${items[v].id}">${items[v].title}</a>`
        html += `</div>`
        html += `<div class='author'>${items[v].author}</div>`
        html += `</div>`
        html += `<div class="edit-delete">`
        html += `<a href="${base}/admin/${route}/edit/${items[v].id}">`
        html += `<img class='edit' src="${base}/public/images/edit.png" />`
        html += `</a>`
        html += `<a href="${base}/admin/${route}/delete/${items[v].id}">`
        html += `<img class='delete' src="${base}/public/images/delete.png" />`
        html += `</a>`
        html += `</div>`
        html += `</div>`
    }
    
    $('.pagination img').attr('src', `${base}/public/images/load-more.png`)
    $('.Listing .wrapper').append(html)
}