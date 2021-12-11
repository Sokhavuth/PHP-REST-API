//public/scripts/backend/paginate.js
var page = 0

function paginate(route, base){
    $('.pagination img').attr('src', `${base}/public/images/loading.gif`)
    page += 1

    $.get(`${base}/backend/${route}/paginate/${page}`, function(data, status){
        appendItem(JSON.parse(data), route, base)
    })
}

function appendItem(items, route, base){
    var html = ''

    for(let v in items){
        var tdate = new Date(items[v][4])
        var dd = tdate.getDate()
        var MM = tdate.getMonth() 
        var yyyy = tdate.getFullYear()
        var currentDate = dd + "-" +( MM+1) + "-" + yyyy
        items[v][4] = currentDate
        html += `<div class='item'>`
        html += `<div class="thumb-wrapper">`
        html += `<a href="${base}/${route}/${items[v][0]}">`
        html += `<img class="thumb" src="${items[v][2]}" />`
        if(items[v][3]){
            html += `<img class='play-icon' src="${base}/public/images/play-icon.png" />`
        }
        html += `</a>`
        html += `</div>`
        html += `<div class='title-wrapper'>`
        html += `<div class='title'>`
        html += `<a href="${base}/${route}/${items[v][0]}">${items[v][1]}</a>`
        html += `</div>`
        html += `<div class="${items[v][0]}">${items[v][4]}</div>`
        html += `</div>`
        html += `<div class="edit-delete">`
        html += `<a href="${base}/backend/${route}/edit/${items[v][0]}">`
        html += `<img class='edit' src="${base}/public/images/edit.png" />`
        html += `</a>`
        html += `<a href="${base}/admin/${route}/delete/${items[v][0]}">`
        html += `<img class='delete' src="${base}/public/images/delete.png" />`
        html += `</a>`
        html += `</div>`
        html += `</div>`
    }
    
    $('.pagination img').attr('src', `${base}/public/images/load-more.png`)
    $('.Listing .wrapper').append(html)
   
}