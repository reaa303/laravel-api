<!DOCTYPE html>
<html>
<head>
<title>Assessment List - E2 E3 E4</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>body{font-family:Arial;padding:10px} button{height:40px;padding:0 15px;margin:5px} #list div{border:1px solid #ccc;padding:10px;margin:5px 0}</style>
</head>
<body>
<h2>Assessment List</h2>
<a href="/products/create"><button>Add Assessment</button></a>
<div>
<button onclick="prevPage()">Prev</button>
<span id="pageInfo">Page 1</span>
<button onclick="nextPage()">Next 10</button>
</div>
<div id="list">Loading...</div>
<script>
function esc(t){let d=document.createElement('div'); d.textContent=t; return d.innerHTML;}
let page=1; let limit=10;
function loadList(){
 document.getElementById('list').innerHTML='Loading...';
 document.getElementById('pageInfo').textContent='Page '+page;
 fetch(`/api/products?page=${page}&limit=${limit}`).then(r=>r.json()).then(data=>{
   let listEl=document.getElementById('list'); listEl.innerHTML='';
   let items=data.data||data;
   if(items.length===0){listEl.innerHTML='<div>No data</div>'; return;}
   items.forEach(p=>{
     let el=document.createElement('div');
     el.textContent=(p.name||p.student_name)+' - '+(p.subject||'')+' - '+(p.grade||p.price||'');
     listEl.appendChild(el);
   });
 });
}
function nextPage(){page++; loadList();}
function prevPage(){if(page>1){page--; loadList();}}
loadList();
</script>
</body>
</html>
