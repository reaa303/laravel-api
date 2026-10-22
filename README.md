# Laravel API - Assessment System (CP Done!)

## E2 - Assessment Feature
- /products/create - Add Assessment Form
- /products - List Assessment
- Working CRUD via API

## E3 - XSS Protection - PASSED
**Test Input:** `<b>LAB_TEST</b>`

**Code na gamit ko:**
```js
function esc(t){
 let d=document.createElement('div');
 d.textContent=t;
 return d.innerHTML;
}
el.textContent = p.name
let limit=10;
fetch(`/api/products?page=${page}&limit=${limit}`)
