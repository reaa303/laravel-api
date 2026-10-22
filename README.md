# Laravel API - Assessment System 

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
```

**Result:** Lumabas as plain text, hindi bold. Safe kasi textContent gamit hindi innerHTML.

## E4 - Performance - PASSED
```js
let limit=10;
fetch(`/api/products?page=${page}&limit=${limit}`)
```
- 10 lang per page
- May Prev/Next button
- Mabilis, hindi niloload lahat

## Proof Screenshots
- index.blade.php - may pagination at textContent
- create.blade.php - may esc() at textContent

**Gawa sa CP lang pero working E2 E3 E4!**
